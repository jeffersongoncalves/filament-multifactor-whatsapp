<?php

return [
    'management_schema' => [
        'actions' => [
            'label' => 'Códigos de verificação por WhatsApp',
            'below_content' => 'Receba um código temporário no seu WhatsApp para verificar a sua identidade ao iniciar sessão.',
            'messages' => [
                'enabled' => 'Ativado',
                'disabled' => 'Desativado',
            ],
        ],
    ],
    'login_form' => [
        'label' => 'Enviar um código para o seu WhatsApp',
        'code' => [
            'label' => 'Introduza o código de 6 dígitos que lhe enviámos por WhatsApp',
            'validation_attribute' => 'código',
            'actions' => [
                'resend' => [
                    'label' => 'Enviar um novo código por WhatsApp',
                    'notifications' => [
                        'resent' => [
                            'title' => 'Enviámos-lhe um novo código por WhatsApp',
                        ],
                        'throttled' => [
                            'title' => 'Demasiadas tentativas de reenvio. Aguarde antes de pedir outro código.',
                        ],
                    ],
                ],
            ],
            'messages' => [
                'invalid' => 'O código introduzido é inválido.',
            ],
        ],
    ],
];
