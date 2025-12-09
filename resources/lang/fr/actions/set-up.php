<?php

return [
    'label' => 'Configurer',
    'modal' => [
        'heading' => 'Configurer les codes de vérification WhatsApp',
        'description' => 'Vous devrez entrer le code à 6 chiffres que nous vous envoyons par WhatsApp à chaque connexion ou action sensible. Consultez votre WhatsApp pour un code à 6 chiffres afin de terminer la configuration.',
        'form' => [
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
        'actions' => [
            'submit' => [
                'label' => 'Activer les codes de vérification WhatsApp',
            ],
        ],
    ],
    'notifications' => [
        'enabled' => [
            'title' => 'Les codes de vérification WhatsApp ont été activés',
        ],
    ],
];
