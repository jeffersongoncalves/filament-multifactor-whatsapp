<?php

return [
    'label' => 'Instellen',
    'modal' => [
        'heading' => 'WhatsApp-verificatiecodes instellen',
        'description' => 'Je moet elke keer dat je inlogt of gevoelige acties uitvoert de 6-cijferige code invoeren die we je via WhatsApp sturen. Controleer je WhatsApp voor een 6-cijferige code om de instelling te voltooien.',
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
                'label' => 'WhatsApp-verificatiecodes inschakelen',
            ],
        ],
    ],
    'notifications' => [
        'enabled' => [
            'title' => 'WhatsApp-verificatiecodes zijn ingeschakeld',
        ],
    ],
];
