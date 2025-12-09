<?php

return [
    'label' => 'Einrichten',
    'modal' => [
        'heading' => 'WhatsApp-Verifizierungscodes einrichten',
        'description' => 'Sie müssen bei jeder Anmeldung oder sensiblen Aktion den 6-stelligen Code eingeben, den wir Ihnen per WhatsApp senden. Prüfen Sie Ihr WhatsApp, um den 6-stelligen Code einzugeben und die Einrichtung abzuschließen.',
        'form' => [
            'code' => [
                'label' => 'Geben Sie den 6-stelligen Code ein, den wir per WhatsApp gesendet haben',
                'validation_attribute' => 'Code',
                'actions' => [
                    'resend' => [
                        'label' => 'Neuen Code per WhatsApp senden',
                        'notifications' => [
                            'resent' => [
                                'title' => 'Wir haben Ihnen einen neuen Code per WhatsApp gesendet',
                            ],
                            'throttled' => [
                                'title' => 'Zu viele erneute Sendeversuche. Bitte warten Sie, bevor Sie einen weiteren Code anfordern.',
                            ],
                        ],
                    ],
                ],
                'messages' => [
                    'invalid' => 'Der eingegebene Code ist ungültig.',
                ],
            ],
        ],
        'actions' => [
            'submit' => [
                'label' => 'WhatsApp-Verifizierungscodes aktivieren',
            ],
        ],
    ],
    'notifications' => [
        'enabled' => [
            'title' => 'WhatsApp-Verifizierungscodes wurden aktiviert',
        ],
    ],
];
