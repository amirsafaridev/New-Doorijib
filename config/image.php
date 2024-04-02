<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Image Driver
    |--------------------------------------------------------------------------
    |
    | Intervention Image supports "GD Library" and "Imagick" to process images
    | internally. You may choose one of them according to your PHP
    | configuration. By default PHP's "GD Library" implementation is used.
    |
    | Supported: "gd", "imagick"
    |
    */


    'driver' => 'gd',
//image size

'index-image-sizes' => [
    'large'=>[
        'width' => 800,
        'height' => 600
    ],
    'medium'=>[
        'width' => 148,
        'height' => 148
    ],
    'small'=>[
        'width' => 55,
        'height' => 55
    ]
    ],
    'default-current-index-image' => 'medium',
        'image-cache-life-time' => 10,//minutes
        'image-not-found' => ''




];
