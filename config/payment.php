<?php

return [
    'zarinpal' => [
        'merchant_id' => env('ZARINPAL_MERCHANT_ID'),
        'callback_url' => env('ZARINPAL_CALLBACK_URL'),
        'base_url' => env('ZARINPAL_BASE_URL', 'https://payment.zarinpal.com/pg/v4'),
    ],
];
