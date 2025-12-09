<?php

return [
    'management_schema' => [
        'actions' => [
            'label' => 'Whatsapp verification codes',
            'below_content' => 'Receive a temporary code at your whatsapp address to verify your identity during login.',
            'messages' => [
                'enabled' => 'Enabled',
                'disabled' => 'Disabled',
            ],
        ],
    ],
    'login_form' => [
        'label' => 'Send a code to your whatsapp',
        'code' => [
            'label' => 'Enter the 6-digit code we sent you by whatsapp',
            'validation_attribute' => 'code',
            'actions' => [
                'resend' => [
                    'label' => 'Send a new code by whatsapp',
                    'notifications' => [
                        'resent' => [
                            'title' => 'We\'ve sent you a new code by whatsapp',
                        ],
                        'throttled' => [
                            'title' => 'Too many resend attempts. Please wait before requesting another code.',
                        ],
                    ],
                ],
            ],
            'messages' => [
                'invalid' => 'The code you entered is invalid.',
            ],
        ],
    ],
];
