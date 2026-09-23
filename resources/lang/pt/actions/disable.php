<?php

return [
    'label' => 'Desativar',
    'modal' => [
        'heading' => 'Desativar códigos de verificação por WhatsApp',
        'description' => 'Tem a certeza de que pretende deixar de receber códigos de verificação por WhatsApp? Desativar esta opção remove uma camada extra de segurança da sua conta.',
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
                'label' => 'Desativar códigos de verificação por WhatsApp',
            ],
        ],
    ],
    'notifications' => [
        'disabled' => [
            'title' => 'Os códigos de verificação por WhatsApp foram desativados',
        ],
    ],
];
