<?php

return [
    'label' => 'Sozlash',
    'modal' => [
        'heading' => 'WhatsApp tasdiqlash kodlarini sozlash',
        'description' => 'Har safar tizimga kirganingizda yoki muhim amallarni bajarganingizda WhatsApp orqali yuboriladigan 6 xonali kodni kiritishingiz kerak boʻladi. Sozlashni yakunlash uchun WhatsAppʼingizdagi 6 xonali kodni tekshiring.',
        'form' => [
            'code' => [
                'label' => 'WhatsApp orqali yuborgan 6 xonali kodni kiriting',
                'validation_attribute' => 'kod',
                'actions' => [
                    'resend' => [
                        'label' => 'WhatsApp orqali yangi kod yuborish',
                        'notifications' => [
                            'resent' => [
                                'title' => 'WhatsApp orqali sizga yangi kod yubordik',
                            ],
                            'throttled' => [
                                'title' => 'Qayta yuborishga urinishlar juda koʻp. Yangi kod soʻrashdan oldin kuting.',
                            ],
                        ],
                    ],
                ],
                'messages' => [
                    'invalid' => 'Kiritilgan kod notoʻgʻri.',
                ],
            ],
        ],
        'actions' => [
            'submit' => [
                'label' => 'WhatsApp tasdiqlash kodlarini yoqish',
            ],
        ],
    ],
    'notifications' => [
        'enabled' => [
            'title' => 'WhatsApp tasdiqlash kodlari yoqildi',
        ],
    ],
];
