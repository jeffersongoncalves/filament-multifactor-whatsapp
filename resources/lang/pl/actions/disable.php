<?php

return [
    'label' => 'Wyłącz',
    'modal' => [
        'heading' => 'Wyłącz kody weryfikacyjne WhatsApp',
        'description' => 'Czy na pewno chcesz przestać otrzymywać kody weryfikacyjne WhatsApp? Wyłączenie usunie dodatkową warstwę bezpieczeństwa z Twojego konta.',
        'form' => [
            'code' => [
                'label' => 'Wpisz 6‑cyfrowy kod, który wysłaliśmy przez WhatsApp',
                'validation_attribute' => 'kod',
                'actions' => [
                    'resend' => [
                        'label' => 'Wyślij nowy kod przez WhatsApp',
                        'notifications' => [
                            'resent' => [
                                'title' => 'Wysłaliśmy nowy kod przez WhatsApp',
                            ],
                            'throttled' => [
                                'title' => 'Zbyt wiele prób ponownego wysłania. Poczekaj przed poproszeniem o kolejny kod.',
                            ],
                        ],
                    ],
                ],
                'messages' => [
                    'invalid' => 'Wprowadzony kod jest nieprawidłowy.',
                ],
            ],
        ],
        'actions' => [
            'submit' => [
                'label' => 'Wyłącz kody weryfikacyjne WhatsApp',
            ],
        ],
    ],
    'notifications' => [
        'disabled' => [
            'title' => 'Kody weryfikacyjne WhatsApp zostały wyłączone',
        ],
    ],
];
