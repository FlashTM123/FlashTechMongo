<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class VNPayService
{
    private $vnp_TmnCode;
    private $vnp_HashSecret;
    private $vnp_Url;
    private $vnp_ReturnUrl;

    public function __construct()
    {
        $this->vnp_TmnCode = env('VNPAY_TMN_CODE', '');
        $this->vnp_HashSecret = env('VNPAY_HASH_SECRET', '');
        $this->vnp_Url = env('VNPAY_URL', 'https://sandbox.vnpayment.vn/paymentv2/vpcpay.html');
        $this->vnp_ReturnUrl = env('VNPAY_RETURN_URL', route('payment.vnpay.return'));
    }

    /**
     * Tạo URL thanh toán VNPay
     */
    public function createPaymentUrl($orderCode, $amount, $orderInfo, $ipAddr)
    {
        $vnp_TxnRef = $orderCode;
        $vnp_OrderInfo = $orderInfo;
        $vnp_OrderType = 'billpayment';
        // Cast amount to int to handle MongoDB Decimal128
        $vnp_Amount = (int)((float)$amount * 100);
        $vnp_Locale = 'vn';
        $vnp_BankCode = '';
        $vnp_IpAddr = $ipAddr;

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $this->vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $this->vnp_ReturnUrl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $this->vnp_Url . "?" . $query;
        if (isset($this->vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $this->vnp_HashSecret);
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        return $vnp_Url;
    }

    /**
     * Xác thực callback từ VNPay
     */
    public function verifyReturnUrl($inputData)
    {
        $vnp_SecureHash = $inputData['vnp_SecureHash'] ?? '';
        unset($inputData['vnp_SecureHash']);
        unset($inputData['vnp_SecureHashType']);

        ksort($inputData);
        $hashdata = "";
        $i = 0;
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashdata, $this->vnp_HashSecret);

        if ($secureHash === $vnp_SecureHash) {
            if ($inputData['vnp_ResponseCode'] == '00') {
                return [
                    'success' => true,
                    'message' => 'Giao dịch thành công',
                    'data' => $inputData
                ];
            } else {
                return [
                    'success' => false,
                    'message' => 'Giao dịch không thành công',
                    'data' => $inputData
                ];
            }
        } else {
            return [
                'success' => false,
                'message' => 'Chữ ký không hợp lệ',
                'data' => null
            ];
        }
    }
}
