<?php

return [
    'label' => 'Turn off',
    'modal' => [
        'heading' => 'Disable WhatsApp verification codes',
        'description' => 'Are you sure you want to stop receiving WhatsApp verification codes? Disabling this will remove an extra layer of security from your account.',
        'form' => [
            'code' => [
                'label' => 'Enter the 6-digit code we sent you by WhatsApp',
                'validation_attribute' => 'code',
                'actions' => [
                    'resend' => [
                        'label' => 'Send a new code by WhatsApp',
                        'notifications' => [
                            'resent' => [
                                'title' => 'We\'ve sent you a new code by WhatsApp',
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
                'label' => 'Disable WhatsApp verification codes',
            ],
        ],
    ],
    'notifications' => [
        'disabled' => [
            'title' => 'WhatsApp verification codes have been disabled',
        ],
    ],
];
