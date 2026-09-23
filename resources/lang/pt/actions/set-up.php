<?php

return [
    'label' => 'Configurar',
    'modal' => [
        'heading' => 'Configurar códigos de verificação por WhatsApp',
        'description' => 'Terá de introduzir o código de 6 dígitos que lhe enviamos por WhatsApp sempre que iniciar sessão ou realizar ações sensíveis. Verifique o seu WhatsApp para obter um código de 6 dígitos e concluir a configuração.',
        'form' => [
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
        'actions' => [
            'submit' => [
                'label' => 'Ativar códigos de verificação por WhatsApp',
            ],
        ],
    ],
    'notifications' => [
        'enabled' => [
            'title' => 'Os códigos de verificação por WhatsApp foram ativados',
        ],
    ],
];
