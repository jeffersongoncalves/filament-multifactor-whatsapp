<?php

return [
    'label' => 'Ausschalten',
    'modal' => [
        'heading' => 'WhatsApp-Verifizierungscodes deaktivieren',
        'description' => 'Sind Sie sicher, dass Sie keine WhatsApp-Verifizierungscodes mehr erhalten möchten? Das Deaktivieren entfernt eine zusätzliche Sicherheitsebene von Ihrem Konto.',
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
                'label' => 'WhatsApp-Verifizierungscodes deaktivieren',
            ],
        ],
    ],
    'notifications' => [
        'disabled' => [
            'title' => 'WhatsApp-Verifizierungscodes wurden deaktiviert',
        ],
    ],
];
