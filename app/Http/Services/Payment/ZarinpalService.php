<?php

namespace App\Http\Services\Payment;

use App\Models\Market\OnlinePayment;
use Illuminate\Support\Facades\Http;

class ZarinpalService
{
    protected $merchantId;
    protected $callbackUrl;
    protected $baseUrl;

    public function __construct()
    {
        $this->merchantId = config('payment.zarinpal.merchant_id');
        $this->callbackUrl = config('payment.zarinpal.callback_url');
        $this->baseUrl = config('payment.zarinpal.base_url');
    }

    protected function isLocal(): bool
    {
        return app()->environment('local'); // بررسی محیط
    }

    /**
     * ارسال درخواست پرداخت
     */
    public function requestPayment(int $amount, string $description, array $metadata = [], string $callbackUrl = null)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
        ])->withOptions([
            'verify' => !$this->isLocal(), // روی لوکال false، روی سرور واقعی true
        ])->post("{$this->baseUrl}/payment/request.json", [
            'merchant_id' => $this->merchantId,
            'amount' => $amount,
            'callback_url' => $callbackUrl ?? $this->callbackUrl,
            'description' => $description,
            'metadata' => $metadata,
        ]);


        return $response->json();
    }

    /**
     * وریفای تراکنش بعد از بازگشت
     */
    public function verifyPayment(int $amount, string $authority)
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
        ])->withOptions([
            'verify' => !$this->isLocal(),
        ])->post("{$this->baseUrl}/payment/verify.json", [
            'merchant_id' => $this->merchantId,
            'amount' => $amount,
            'authority' => $authority,
        ]);

        return $response->json();
    }
}
