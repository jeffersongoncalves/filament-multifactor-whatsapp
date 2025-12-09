<?php

return [
    'management_schema' => [
        'actions' => [
            'label' => 'WhatsApp-verificatiecodes',
            'below_content' => 'Ontvang een tijdelijke code op je WhatsApp om je identiteit te verifiëren tijdens het inloggen.',
            'messages' => [
                'enabled' => 'Ingeschakeld',
                'disabled' => 'Uitgeschakeld',
            ],
        ],
    ],
    'login_form' => [
        'label' => 'Stuur een code naar je WhatsApp',
        'code' => [
            'label' => 'Voer de 6-cijferige code in die we via WhatsApp hebben gestuurd',
            'validation_attribute' => 'code',
            'actions' => [
                'resend' => [
                    'label' => 'Nieuwe code via WhatsApp verzenden',
                    'notifications' => [
                        'resent' => [
                            'title' => 'We hebben je een nieuwe code via WhatsApp gestuurd',
                        ],
                        'throttled' => [
                            'title' => 'Te veel pogingen om opnieuw te verzenden. Wacht even voordat je een nieuwe code aanvraagt.',
                        ],
                    ],
                ],
            ],
            'messages' => [
                'invalid' => 'De ingevoerde code is ongeldig.',
            ],
        ],
    ],
];
