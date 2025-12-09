<?php

return [
    'management_schema' => [
        'actions' => [
            'label' => 'Codes de vérification WhatsApp',
            'below_content' => 'Recevez un code temporaire sur votre WhatsApp pour vérifier votre identité lors de la connexion.',
            'messages' => [
                'enabled' => 'Activé',
                'disabled' => 'Désactivé',
            ],
        ],
    ],
    'login_form' => [
        'label' => 'Envoyer un code à votre WhatsApp',
        'code' => [
            'label' => 'Saisissez le code à 6 chiffres que nous vous avons envoyé par WhatsApp',
            'validation_attribute' => 'code',
            'actions' => [
                'resend' => [
                    'label' => 'Envoyer un nouveau code par WhatsApp',
                    'notifications' => [
                        'resent' => [
                            'title' => 'Nous vous avons envoyé un nouveau code par WhatsApp',
                        ],
                        'throttled' => [
                            'title' => 'Trop de tentatives de renvoi. Veuillez patienter avant de demander un autre code.',
                        ],
                    ],
                ],
            ],
            'messages' => [
                'invalid' => 'Le code saisi est invalide.',
            ],
        ],
    ],
];
