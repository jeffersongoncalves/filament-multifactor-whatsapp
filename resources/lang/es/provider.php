<?php

return [
    'management_schema' => [
        'actions' => [
            'label' => 'Códigos de verificación por WhatsApp',
            'below_content' => 'Recibe un código temporal en tu WhatsApp para verificar tu identidad durante el inicio de sesión.',
            'messages' => [
                'enabled' => 'Habilitado',
                'disabled' => 'Deshabilitado',
            ],
        ],
    ],
    'login_form' => [
        'label' => 'Enviar un código a tu WhatsApp',
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
];
