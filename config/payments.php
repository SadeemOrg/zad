<?php

return [

    'cardcom' => [
        'terminal_number' => env('CARDCOM_TERMINAL_NUMBER', '1000'),
        'user_name' => env('CARDCOM_USER_NAME', 'barak9611'),
        'password' => env('CARDCOM_PASSWORD', 'c1234567!'),
        'create_invoice' => false,
        'max_num_of_payments' => 6,
    ],
];