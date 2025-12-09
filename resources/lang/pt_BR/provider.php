<?php

return [
    'management_schema' => [
        'actions' => [
            'label' => 'Códigos de verificação pelo WhatsApp',
            'below_content' => 'Receba um código temporário no seu WhatsApp para verificar sua identidade durante o login.',
            'messages' => [
                'enabled' => 'Ativado',
                'disabled' => 'Desativado',
            ],
        ],
    ],
    'login_form' => [
        'label' => 'Enviar um código para o seu WhatsApp',
        'code' => [
            'label' => 'Insira o código de 6 dígitos que enviamos pelo WhatsApp',
            'validation_attribute' => 'código',
            'actions' => [
                'resend' => [
                    'label' => 'Enviar um novo código pelo WhatsApp',
                    'notifications' => [
                        'resent' => [
                            'title' => 'Enviamos um novo código pelo WhatsApp',
                        ],
                        'throttled' => [
                            'title' => 'Muitas tentativas de reenvio. Aguarde antes de solicitar outro código.',
                        ],
                    ],
                ],
            ],
            'messages' => [
                'invalid' => 'O código inserido é inválido.',
            ],
        ],
    ],
];
