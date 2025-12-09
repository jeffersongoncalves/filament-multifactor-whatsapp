<?php

return [
    'label' => 'Set up',
    'modal' => [
        'heading' => 'Set up whatsapp verification codes',
        'description' => 'You\'ll need to enter the 6-digit code we send you by whatsapp each time you sign in or perform sensitive actions. Check your whatsapp for a 6-digit code to complete the setup.',
        'form' => [
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
        'actions' => [
            'submit' => [
                'label' => 'Enable whatsapp verification codes',
            ],
        ],
    ],
    'notifications' => [
        'enabled' => [
            'title' => 'Whatsapp verification codes have been enabled',
        ],
    ],
];
