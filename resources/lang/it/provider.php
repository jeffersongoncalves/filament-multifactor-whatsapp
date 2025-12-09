<?php

return [
    'management_schema' => [
        'actions' => [
            'label' => 'Codici di verifica WhatsApp',
            'below_content' => 'Ricevi un codice temporaneo su WhatsApp per verificare la tua identità durante l’accesso.',
            'messages' => [
                'enabled' => 'Abilitato',
                'disabled' => 'Disattivato',
            ],
        ],
    ],
    'login_form' => [
        'label' => 'Invia un codice al tuo WhatsApp',
        'code' => [
            'label' => 'Inserisci il codice a 6 cifre che ti abbiamo inviato via WhatsApp',
            'validation_attribute' => 'codice',
            'actions' => [
                'resend' => [
                    'label' => 'Invia un nuovo codice via WhatsApp',
                    'notifications' => [
                        'resent' => [
                            'title' => 'Ti abbiamo inviato un nuovo codice via WhatsApp',
                        ],
                        'throttled' => [
                            'title' => 'Troppi tentativi di reinvio. Attendi prima di richiedere un altro codice.',
                        ],
                    ],
                ],
            ],
            'messages' => [
                'invalid' => 'Il codice inserito non è valido.',
            ],
        ],
    ],
];
