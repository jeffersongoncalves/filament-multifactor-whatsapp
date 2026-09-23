<?php

return [
    'label' => 'Oʻchirish',
    'modal' => [
        'heading' => 'WhatsApp tasdiqlash kodlarini oʻchirish',
        'description' => 'WhatsApp tasdiqlash kodlarini olishni toʻxtatmoqchimisiz? Buni oʻchirish hisobingizdan qoʻshimcha xavfsizlik qatlamini olib tashlaydi.',
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
                'label' => 'WhatsApp tasdiqlash kodlarini oʻchirish',
            ],
        ],
    ],
    'notifications' => [
        'disabled' => [
            'title' => 'WhatsApp tasdiqlash kodlari oʻchirildi',
        ],
    ],
];
