<?php

return [
    'label' => 'Kapat',
    'modal' => [
        'heading' => 'WhatsApp doğrulama kodlarını devre dışı bırak',
        'description' => 'WhatsApp doğrulama kodlarını almayı durdurmak istediğinizden emin misiniz? Bunu devre dışı bırakmak hesabınızdan ek bir güvenlik katmanını kaldıracaktır.',
        'form' => [
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
        'actions' => [
            'submit' => [
                'label' => 'WhatsApp doğrulama kodlarını devre dışı bırak',
            ],
        ],
    ],
    'notifications' => [
        'disabled' => [
            'title' => 'WhatsApp doğrulama kodları devre dışı bırakıldı',
        ],
    ],
];
