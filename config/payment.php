<?php

return [
    'zarinpal' => [
        'merchant_id' => env('ZARINPAL_MERCHANT_ID', 'f831f231-60ce-47db-a7b8-b198a6b72332'),
        'callback_url' => env('ZARINPAL_CALLBACK_URL', 'http://saeidmarket.ir/verify'),
        'base_url' => env('ZARINPAL_BASE_URL', 'https://payment.zarinpal.com/pg/v4'),
    ],
];
