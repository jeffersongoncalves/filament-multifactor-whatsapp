<?php

return [
    'label' => 'Uitzetten',
    'modal' => [
        'heading' => 'WhatsApp-verificatiecodes uitschakelen',
        'description' => 'Weet je zeker dat je geen WhatsApp-verificatiecodes meer wilt ontvangen? Uitschakelen verwijdert een extra beveiligingslaag van je account.',
        'form' => [
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
        'actions' => [
            'submit' => [
                'label' => 'WhatsApp-verificatiecodes uitschakelen',
            ],
        ],
    ],
    'notifications' => [
        'disabled' => [
            'title' => 'WhatsApp-verificatiecodes zijn uitgeschakeld',
        ],
    ],
];
