<?php

return [
    'label' => 'Kur',
    'modal' => [
        'heading' => 'WhatsApp doğrulama kodlarını ayarlayın',
        'description' => 'Her oturum açtığınızda veya hassas işlemler gerçekleştirdiğinizde, size WhatsApp üzerinden gönderdiğimiz 6 haneli kodu girmeniz gerekir. Kurulumu tamamlamak için WhatsApp’ınızı kontrol edin ve 6 haneli kodu girin.',
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
                'label' => 'WhatsApp doğrulama kodlarını etkinleştir',
            ],
        ],
    ],
    'notifications' => [
        'enabled' => [
            'title' => 'WhatsApp doğrulama kodları etkinleştirildi',
        ],
    ],
];
