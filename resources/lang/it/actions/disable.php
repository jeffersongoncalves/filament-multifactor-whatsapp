<?php

return [
    'label' => 'Disattiva',
    'modal' => [
        'heading' => 'Disattiva i codici di verifica WhatsApp',
        'description' => 'Sei sicuro di voler smettere di ricevere i codici di verifica WhatsApp? La disattivazione rimuoverà un ulteriore livello di sicurezza dal tuo account.',
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
                'label' => 'Disattiva i codici di verifica WhatsApp',
            ],
        ],
    ],
    'notifications' => [
        'disabled' => [
            'title' => 'I codici di verifica WhatsApp sono stati disattivati',
        ],
    ],
];
