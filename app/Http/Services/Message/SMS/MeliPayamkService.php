<?php


namespace App\Http\Services\Message\SMS;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Config;


class MeliPayamkService
{
    protected string $apiKey;

    public function __construct()
    {
        $this->apiKey = Config::get('sms.api_key');
    }

    /**
     * ارسال OTP
     *
     * @param string $mobile
     * @return array
     */
    public function sendOtp(string $mobile): array
    {
        $url = "https://console.melipayamak.com/api/send/otp/{$this->apiKey}";

        // تنظیم verify بر اساس محیط
        $httpOptions = [];
        if (app()->environment(['local', 'testing'])) {
            $httpOptions['verify'] = false;
        }

        $response = Http::withOptions($httpOptions)
            ->withHeaders([
                'Content-Type' => 'application/json',
            ])->post($url, [
                'to' => $mobile,
            ]);

        if ($response->successful()) {
            return $response->json(); // مثلاً {"status":1,"code":12345}
        }

        return [
            'status' => 0,
            'message' => $response->body(),
        ];
    }

    public function sendSmsGroup()
    {
        $url = "https://console.melipayamak.com/api/send/advanced/d5e92f89fc8641c0bbc3ba13bc2d6f4e";

        // تنظیم verify بر اساس محیط
        $httpOptions = [];
        if (app()->environment(['local', 'testing'])) {
            $httpOptions['verify'] = false;
        }

        $response = Http::withOptions($httpOptions)
            ->withHeaders([
                'Content-Type' => 'application/json',
            ])->post($url, [
                'from' => 50002710066430,
                'to' => '09170766430',
                'text' => 'متن پیامک'

            ]);

        if ($response->successful()) {
            return $response->json(); // مثلاً {"status":1,"code":12345}
        }

        return [
            'status' => 0,
            'message' => $response->body(),
        ];
    }
}
