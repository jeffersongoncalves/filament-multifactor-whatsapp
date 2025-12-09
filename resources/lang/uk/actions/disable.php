<?php

return [
    'label' => 'Вимкнути',
    'modal' => [
        'heading' => 'Вимкнути коди підтвердження WhatsApp',
        'description' => 'Ви впевнені, що більше не хочете отримувати коди підтвердження WhatsApp? Вимкнення прибере додатковий рівень безпеки з вашого облікового запису.',
        'form' => [
            'code' => [
                'label' => 'Введіть 6‑значний код, який ми надіслали у WhatsApp',
                'validation_attribute' => 'код',
                'actions' => [
                    'resend' => [
                        'label' => 'Надіслати новий код у WhatsApp',
                        'notifications' => [
                            'resent' => [
                                'title' => 'Ми надіслали вам новий код у WhatsApp',
                            ],
                            'throttled' => [
                                'title' => 'Занадто багато спроб повторної відправки. Будь ласка, зачекайте перед наступним запитом коду.',
                            ],
                        ],
                    ],
                ],
                'messages' => [
                    'invalid' => 'Введений код недійсний.',
                ],
            ],
        ],
        'actions' => [
            'submit' => [
                'label' => 'Вимкнути коди підтвердження WhatsApp',
            ],
        ],
    ],
    'notifications' => [
        'disabled' => [
            'title' => 'Коди підтвердження WhatsApp вимкнено',
        ],
    ],
];
