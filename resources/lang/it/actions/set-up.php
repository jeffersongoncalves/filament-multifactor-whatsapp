<?php

return [
    'label' => 'Configura',
    'modal' => [
        'heading' => 'Configura i codici di verifica WhatsApp',
        'description' => 'Dovrai inserire il codice a 6 cifre che ti inviamo via WhatsApp ogni volta che accedi o esegui azioni sensibili. Controlla WhatsApp per un codice a 6 cifre per completare la configurazione.',
        'form' => [
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
        'actions' => [
            'submit' => [
                'label' => 'Abilita i codici di verifica WhatsApp',
            ],
        ],
    ],
    'notifications' => [
        'enabled' => [
            'title' => 'I codici di verifica WhatsApp sono stati abilitati',
        ],
    ],
];
