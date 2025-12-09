<?php

return [
    'management_schema' => [
        'actions' => [
            'label' => 'Коды подтверждения WhatsApp',
            'below_content' => 'Получайте временный код в WhatsApp для подтверждения личности при входе.',
            'messages' => [
                'enabled' => 'Включено',
                'disabled' => 'Отключено',
            ],
        ],
    ],
    'login_form' => [
        'label' => 'Отправить код в ваш WhatsApp',
        'code' => [
            'label' => 'Введите 6‑значный код, который мы отправили в WhatsApp',
            'validation_attribute' => 'код',
            'actions' => [
                'resend' => [
                    'label' => 'Отправить новый код в WhatsApp',
                    'notifications' => [
                        'resent' => [
                            'title' => 'Мы отправили вам новый код в WhatsApp',
                        ],
                        'throttled' => [
                            'title' => 'Слишком много попыток повторной отправки. Пожалуйста, подождите перед следующей попыткой.',
                        ],
                    ],
                ],
            ],
            'messages' => [
                'invalid' => 'Введённый код недействителен.',
            ],
        ],
    ],
];
