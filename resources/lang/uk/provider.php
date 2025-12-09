<?php

return [
    'management_schema' => [
        'actions' => [
            'label' => 'Коди підтвердження WhatsApp',
            'below_content' => 'Отримуйте тимчасовий код у WhatsApp, щоб підтвердити свою особу під час входу.',
            'messages' => [
                'enabled' => 'Увімкнено',
                'disabled' => 'Вимкнено',
            ],
        ],
    ],
    'login_form' => [
        'label' => 'Надіслати код до вашого WhatsApp',
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
];
