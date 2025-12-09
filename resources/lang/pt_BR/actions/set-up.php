<?php

return [
    'label' => 'Configurar',
    'modal' => [
        'heading' => 'Configurar códigos de verificação pelo WhatsApp',
        'description' => 'Você precisará inserir o código de 6 dígitos que enviamos pelo WhatsApp sempre que fizer login ou executar ações sensíveis. Verifique seu WhatsApp para obter um código de 6 dígitos e concluir a configuração.',
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
                'label' => 'Ativar códigos de verificação pelo WhatsApp',
            ],
        ],
    ],
    'notifications' => [
        'enabled' => [
            'title' => 'Os códigos de verificação pelo WhatsApp foram ativados',
        ],
    ],
];
