<?php

return [
    'management_schema' => [
        'actions' => [
            'label' => 'WhatsApp-Verifizierungscodes',
            'below_content' => 'Erhalten Sie einen temporären Code an Ihr WhatsApp, um Ihre Identität beim Anmelden zu verifizieren.',
            'messages' => [
                'enabled' => 'Aktiviert',
                'disabled' => 'Deaktiviert',
            ],
        ],
    ],
    'login_form' => [
        'label' => 'Einen Code an Ihr WhatsApp senden',
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
];
