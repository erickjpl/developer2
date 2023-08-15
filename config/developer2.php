<?php

return [
    /*
    |--------------------------------------------------------------------------
    | API Variables
    |--------------------------------------------------------------------------
    |
    | This list of variables is used to connect to the API
    | of the Developer2 application.
    |
    */

    'api_key' => env('DEVELOPER2_API_KEY'),
    'api_base_url' => env('DEVELOPER2_API_BASE_URL'),
    'api_public_uri' => env('DEVELOPER2_API_PUBLIC_URI'),
    'code_machine' => env('DEVELOPER2_CODE_MACHINE'),
    'authorization_number' => env('DEVELOPER2_AUTHORIZATION_NUMBER'),

    /*
    |--------------------------------------------------------------------------
    | Endpoint
    |--------------------------------------------------------------------------
    |
    | Specific location within the API.
    |
    */
    'uri_check_availability' => env('DEVELOPER2_API_URI_CHECK_AVAILABILITY'),
    'uri_generate_qr' => env('DEVELOPER2_API_URI_GENERATE_QR'),
    'uri_read_qr' => env('DEVELOPER2_API_URI_READ_QR'),
    'uri_confirm_dispensation' => env('DEVELOPER2_API_URI_CONFIRM_DISPENSATION'),
    'uri_lock' => env('DEVELOPER2_API_URI_LOCK'),
    'uri_upload_money' => env('DEVELOPER2_API_URI_UPLOAD_MONEY'),
    'uri_download_money' => env('DEVELOPER2_API_URI_DOWNLOAD_MONEY'),
    'uri_money_in_drawer_rejection' => env('DEVELOPER2_API_URI_MONEY_IN_DRAWER_REJECTION'),
];
