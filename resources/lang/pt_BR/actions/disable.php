<?php

return [
    'label' => 'Desativar',
    'modal' => [
        'heading' => 'Desativar códigos de verificação pelo WhatsApp',
        'description' => 'Tem certeza de que deseja parar de receber códigos de verificação pelo WhatsApp? Desativar isso removerá uma camada extra de segurança da sua conta.',
        'form' => [
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
        'actions' => [
            'submit' => [
                'label' => 'Desativar códigos de verificação pelo WhatsApp',
            ],
        ],
    ],
    'notifications' => [
        'disabled' => [
            'title' => 'Os códigos de verificação pelo WhatsApp foram desativados',
        ],
    ],
];
