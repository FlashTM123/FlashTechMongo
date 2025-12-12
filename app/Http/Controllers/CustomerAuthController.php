<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Customer;

class CustomerAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('Customers.Account.login');
    }
    public function showRegisterForm(){
        return view('Customers.Account.register');
    }

    public function register(Request $request){
        // Validate the incoming request data
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers',
            'phone_number' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            'password' => 'required|string|min:8|confirmed',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|in:male,female,other',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ], [
            'profile_picture.max' => 'Ảnh đại diện không được vượt quá 5MB.',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp.',
            'email.unique' => 'Email này đã được sử dụng.',
        ]);

        // Generate unique customer code
        $customer_code = $this->generateCustomerCode();

        // Create the customer
        $customer = new \App\Models\Customer();
        $customer->customer_code = $customer_code;
        $customer->full_name = $request->full_name;
        $customer->email = $request->email;
        $customer->phone_number = $request->phone_number;
        $customer->address = $request->address;
        $customer->password = bcrypt($request->password);
        $customer->date_of_birth = $request->date_of_birth;
        $customer->gender = $request->gender;
        $customer->loyalty_points = 0; // Initialize loyalty points

        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $customer->profile_picture = $path;
        }

        $customer->save();

        // You might want to log the customer in or redirect them after registration
        return redirect()->route('customers.login')->with('success', 'Registration successful. Please log in.');
    }

    /**
     * Generate unique customer code
     * Format: KH + YYYYMMDD + 4 random digits (e.g., KH202512070001)
     */
    private function generateCustomerCode()
    {
        do {
            // Format: KH + Date + Random 4 digits
            $code = 'KH' . date('Ymd') . str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

            // Check if code already exists
            $exists = \App\Models\Customer::where('customer_code', $code)->exists();
        } while ($exists);

        return $code;
    }
    public function login(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Attempt to find the customer by email
        $customer = \App\Models\Customer::where('email', $request->email)->first();

        // Check if customer exists and password matches
        if ($customer && \Illuminate\Support\Facades\Hash::check($request->password, $customer->password)) {
            // Store customer info in session
            session(['customer' => $customer]);

            return redirect()->route('home')->with('success', 'Login successful.');
        } else {
            return back()->withErrors(['email' => 'Invalid email or password.'])->withInput();
        }
    }
    public function logout(Request $request)
    {
        // Clear the customer session
        $request->session()->forget('customer');
        $request->session()->flush();

        return redirect()->route('home')->with('success', 'Đăng xuất thành công.');
    }
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')
                ->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))
                ->user();

            $customer = Customer::where('google_id', $googleUser->getId())->orWhere('email', $googleUser->getEmail())->first();

            if($customer){
                if(!$customer->google_id){

                    $customer->google_id = $googleUser->getId();
                $customer->save();
                }
            } else {
                $customer = Customer::create([
                    'customer_code' => $this->generateCustomerCode(),
                    'full_name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'profile_picture' => $googleUser->getAvatar(),
                    'loyalty_points' => 0,
                ]);
            }
            session(['customer' => $customer]);
            return redirect()->route('home')->with('success', 'Login with Google successful.');


        } catch (\Exception $e) {
            // Log lỗi chi tiết
            \Log::error('Google Login Error: ' . $e->getMessage());
            return redirect()->route('customers.login')->withErrors(['oauth' => 'Lỗi: ' . $e->getMessage()]);
        }
    }
}
