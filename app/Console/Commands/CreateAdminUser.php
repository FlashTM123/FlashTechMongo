<?php

namespace App\Console\Commands;

use App\Models\Users;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create {--email=admin@flashtech.com} {--password=admin123} {--name=Admin}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Tạo tài khoản admin mới';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->option('email');
        $password = $this->option('password');
        $name = $this->option('name');

        // Check if admin already exists
        if (Users::where('email', $email)->exists()) {
            $this->error("Admin với email '{$email}' đã tồn tại!");
            return 1;
        }

        // Create admin user
        $admin = Users::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'role' => 'admin',
            'is_blocked' => false,
        ]);

        $this->info("✅ Tạo admin thành công!");
        $this->line("📧 Email: {$email}");
        $this->line("🔒 Mật khẩu: {$password}");
        $this->line("👤 Tên: {$name}");

        return 0;
    }
}
