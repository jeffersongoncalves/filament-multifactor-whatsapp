<?php

return [
    'label' => 'Désactiver',
    'modal' => [
        'heading' => 'Désactiver les codes de vérification WhatsApp',
        'description' => 'Êtes-vous sûr de ne plus vouloir recevoir de codes de vérification WhatsApp ? La désactivation supprimera une couche supplémentaire de sécurité de votre compte.',
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
                'label' => 'Désactiver les codes de vérification WhatsApp',
            ],
        ],
    ],
    'notifications' => [
        'disabled' => [
            'title' => 'Les codes de vérification WhatsApp ont été désactivés',
        ],
    ],
];
