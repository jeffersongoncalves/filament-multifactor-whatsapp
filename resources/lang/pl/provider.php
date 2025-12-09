<?php

return [
    'management_schema' => [
        'actions' => [
            'label' => 'Kody weryfikacyjne WhatsApp',
            'below_content' => 'Odbierz tymczasowy kod na WhatsApp, aby zweryfikować swoją tożsamość podczas logowania.',
            'messages' => [
                'enabled' => 'Włączone',
                'disabled' => 'Wyłączone',
            ],
        ],
    ],
    'login_form' => [
        'label' => 'Wyślij kod na WhatsApp',
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
];
