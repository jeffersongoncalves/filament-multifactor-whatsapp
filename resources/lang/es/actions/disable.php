<?php

return [
    'label' => 'Desactivar',
    'modal' => [
        'heading' => 'Desactivar códigos de verificación por WhatsApp',
        'description' => '¿Seguro que quieres dejar de recibir códigos de verificación por WhatsApp? Desactivar esto eliminará una capa adicional de seguridad de tu cuenta.',
        'form' => [
            'code' => [
                'label' => 'Ingresa el código de 6 dígitos que te enviamos por WhatsApp',
                'validation_attribute' => 'código',
                'actions' => [
                    'resend' => [
                        'label' => 'Enviar un nuevo código por WhatsApp',
                        'notifications' => [
                            'resent' => [
                                'title' => 'Te hemos enviado un nuevo código por WhatsApp',
                            ],
                            'throttled' => [
                                'title' => 'Demasiados intentos de reenvío. Espera antes de solicitar otro código.',
                            ],
                        ],
                    ],
                ],
                'messages' => [
                    'invalid' => 'El código ingresado no es válido.',
                ],
            ],
        ],
        'actions' => [
            'submit' => [
                'label' => 'Desactivar códigos de verificación por WhatsApp',
            ],
        ],
    ],
    'notifications' => [
        'disabled' => [
            'title' => 'Los códigos de verificación por WhatsApp han sido desactivados',
        ],
    ],
];
