<?php

return [
    'label' => 'Turn off',
    'modal' => [
        'heading' => 'Disable whatsapp verification codes',
        'description' => 'Are you sure you want to stop receiving whatsapp verification codes? Disabling this will remove an extra layer of security from your account.',
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
                'label' => 'Disable whatsapp verification codes',
            ],
        ],
    ],
    'notifications' => [
        'disabled' => [
            'title' => 'Whatsapp verification codes have been disabled',
        ],
    ],
];
