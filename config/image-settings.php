<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Image Driver
    |--------------------------------------------------------------------------
    |
    | Supported drivers: "gd", "imagick"
    |
    */

    'driver' => 'gd',

    /*
    |--------------------------------------------------------------------------
    | Image Sizes for Index Pages
    |--------------------------------------------------------------------------
    |
    | Define standard image sizes used in index views or image processing.
    |
    */

    'index_image_sizes' => [
        'large' => [
            'width' => 800,
            'height' => 600,
        ],
        'medium' => [
            'width' => 400,
            'height' => 300,
        ],
        'small' => [
            'width' => 80,
            'height' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Index Size
    |--------------------------------------------------------------------------
    |
    | This is the default image size used when no size is specified.
    |
    */

    'default_index_size' => 'medium',

];
