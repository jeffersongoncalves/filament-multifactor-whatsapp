<?php

return [
    'label' => 'Configurar',
    'modal' => [
        'heading' => 'Configurar códigos de verificación por WhatsApp',
        'description' => 'Deberás ingresar el código de 6 dígitos que te enviamos por WhatsApp cada vez que inicies sesión o realices acciones sensibles. Revisa tu WhatsApp para obtener un código de 6 dígitos y completar la configuración.',
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
                'label' => 'Habilitar códigos de verificación por WhatsApp',
            ],
        ],
    ],
    'notifications' => [
        'enabled' => [
            'title' => 'Los códigos de verificación por WhatsApp han sido habilitados',
        ],
    ],
];
