<?php

return [
    'label' => 'Skonfiguruj',
    'modal' => [
        'heading' => 'Skonfiguruj kody weryfikacyjne WhatsApp',
        'description' => 'Za każdym razem, gdy się logujesz lub wykonujesz wrażliwe działania, musisz wprowadzić 6‑cyfrowy kod wysłany przez WhatsApp. Sprawdź WhatsApp, aby uzyskać 6‑cyfrowy kod i dokończyć konfigurację.',
        'form' => [
            'code' => [
                'label' => 'Wpisz 6‑cyfrowy kod wysłany przez WhatsApp',
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
                'label' => 'Włącz kody weryfikacyjne WhatsApp',
            ],
        ],
    ],
    'notifications' => [
        'enabled' => [
            'title' => 'Kody weryfikacyjne WhatsApp zostały włączone',
        ],
    ],
];
