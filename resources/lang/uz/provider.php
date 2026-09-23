<?php

return [
    'management_schema' => [
        'actions' => [
            'label' => 'WhatsApp tasdiqlash kodlari',
            'below_content' => 'Kirish paytida shaxsingizni tasdiqlash uchun WhatsAppʼingizga vaqtinchalik kod oling.',
            'messages' => [
                'enabled' => 'Yoqilgan',
                'disabled' => 'Oʻchirilgan',
            ],
        ],
    ],
    'login_form' => [
        'label' => 'WhatsAppʼingizga kod yuborish',
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
];
