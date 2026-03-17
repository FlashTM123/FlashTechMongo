<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class MoMoService
{
    private $partnerCode;
    private $accessKey;
    private $secretKey;
    private $endpoint;
    private $returnUrl;
    private $notifyUrl;

    public function __construct()
    {
        $this->partnerCode = env('MOMO_PARTNER_CODE', '');
        $this->accessKey = env('MOMO_ACCESS_KEY', '');
        $this->secretKey = env('MOMO_SECRET_KEY', '');
        $this->endpoint = env('MOMO_ENDPOINT', 'https://test-payment.momo.vn/v2/gateway/api/create');
        $this->returnUrl = env('MOMO_RETURN_URL', route('payment.momo.return'));
        $this->notifyUrl = env('MOMO_NOTIFY_URL', route('payment.momo.notify'));
    }

    /**
     * Tạo URL thanh toán MoMo
     */
    public function createPaymentUrl($orderCode, $amount, $orderInfo)
    {
        $requestId = time() . rand(1000, 9999);
        $orderId = $orderCode;
        $redirectUrl = $this->returnUrl;
        $ipnUrl = $this->notifyUrl;
        $extraData = "";
        $requestType = "captureWallet";

        // Cast amount to int to handle MongoDB Decimal128
        $amount = (int)((float)$amount);

        // Tạo chữ ký theo thứ tự alphabetical (required by MoMo)
        // Cần encode URL trong signature
        $rawHash = "accessKey=" . $this->accessKey .
                   "&amount=" . $amount .
                   "&extraData=" . $extraData .
                   "&ipnUrl=" . urlencode($ipnUrl) .
                   "&orderId=" . $orderId .
                   "&orderInfo=" . urlencode($orderInfo) .

        $signature = hash_hmac("sha256", $rawHash, $this->secretKey);

        $data = array(
            'partnerCode' => $this->partnerCode,
            'partnerName' => "FlashTech",
            'storeId' => "FlashTechStore",
            'requestId' => (string)$requestId,
            'amount' => (int)$amount,
            'orderId' => (string)$orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        );

        try {
            $result = $this->execPostRequest($this->endpoint, json_encode($data));
            $jsonResult = json_decode($result, true);

            if (isset($jsonResult['payUrl'])) {
                return [
                    'success' => true,
                    'payUrl' => $jsonResult['payUrl'],
                    'message' => 'Tạo link thanh toán thành công'
                ];
            } else {
                Log::error('MoMo Payment Error: ' . json_encode($jsonResult));
                return [
                    'success' => false,
                    'payUrl' => null,
                    'message' => $jsonResult['message'] ?? 'Không thể tạo link thanh toán'
                ];
            }
        } catch (\Exception $e) {
            Log::error('MoMo Payment Exception: ' . $e->getMessage());
            return [
                'success' => false,
                'payUrl' => null,
                'message' => 'Lỗi kết nối đến MoMo'
            ];
        }
    }

    /**
     * Xác thực callback từ MoMo
     */
    public function verifyReturnUrl($inputData)
    {
        $partnerCode = $inputData['partnerCode'] ?? '';
        $orderId = $inputData['orderId'] ?? '';
        $requestId = $inputData['requestId'] ?? '';
        $amount = $inputData['amount'] ?? '';
        $orderInfo = $inputData['orderInfo'] ?? '';
        $orderType = $inputData['orderType'] ?? '';
        $transId = $inputData['transId'] ?? '';
        $resultCode = $inputData['resultCode'] ?? '';
        $message = $inputData['message'] ?? '';
        $payType = $inputData['payType'] ?? '';
        $responseTime = $inputData['responseTime'] ?? '';
        $extraData = $inputData['extraData'] ?? '';
        $signature = $inputData['signature'] ?? '';

        // Tạo chữ ký để xác thực
        $rawHash = "accessKey=" . $this->accessKey .
                   "&amount=" . $amount .
                   "&extraData=" . $extraData .
                   "&message=" . $message .
                   "&orderId=" . $orderId .
                   "&orderInfo=" . $orderInfo .
                   "&orderType=" . $orderType .
                   "&partnerCode=" . $partnerCode .
                   "&payType=" . $payType .
                   "&requestId=" . $requestId .
                   "&responseTime=" . $responseTime .
                   "&resultCode=" . $resultCode .
                   "&transId=" . $transId;

        $checkSignature = hash_hmac("sha256", $rawHash, $this->secretKey);

        if ($signature === $checkSignature) {
            if ($resultCode == '0') {
                return [
                    'success' => true,
                    'message' => 'Giao dịch thành công',
                    'data' => $inputData
                ];
            } else {
                return [
                    'success' => false,
                    'message' => $message,
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

    /**
     * Gửi POST request
     */
    private function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data))
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}
