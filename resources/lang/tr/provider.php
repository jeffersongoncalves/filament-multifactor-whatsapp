<?php

return [
    'management_schema' => [
        'actions' => [
            'label' => 'WhatsApp doğrulama kodları',
            'below_content' => 'Giriş sırasında kimliğinizi doğrulamak için WhatsApp’ınıza geçici bir kod alın.',
            'messages' => [
                'enabled' => 'Etkin',
                'disabled' => 'Devre dışı',
            ],
        ],
    ],
    'login_form' => [
        'label' => 'WhatsApp’ınıza bir kod gönderin',
        'code' => [
            'label' => 'WhatsApp ile gönderdiğimiz 6 haneli kodu girin',
            'validation_attribute' => 'kod',
            'actions' => [
                'resend' => [
                    'label' => 'WhatsApp ile yeni kod gönder',
                    'notifications' => [
                        'resent' => [
                            'title' => 'Size WhatsApp ile yeni bir kod gönderdik',
                        ],
                        'throttled' => [
                            'title' => 'Çok fazla yeniden gönderme denemesi. Lütfen başka bir kod istemeden önce bekleyin.',
                        ],
                    ],
                ],
            ],
            'messages' => [
                'invalid' => 'Girdiğiniz kod geçersiz.',
            ],
        ],
    ],
];
