<?php

return [
    'management_schema' => [
        'actions' => [
            'label' => 'WhatsApp təsdiq kodları',
            'below_content' => 'Giriş zamanı kimliyinizi təsdiqləmək üçün WhatsApp ünvanınıza müvəqqəti kod alın.',
            'messages' => [
                'enabled' => 'Aktiv',
                'disabled' => 'Deaktiv',
            ],
        ],
    ],
    'login_form' => [
        'label' => 'WhatsApp-a kod göndər',
        'code' => [
            'label' => 'WhatsApp ilə göndərdiyimiz 6 rəqəmli kodu daxil edin',
            'validation_attribute' => 'kod',
            'actions' => [
                'resend' => [
                    'label' => 'WhatsApp ilə yeni kod göndər',
                    'notifications' => [
                        'resent' => [
                            'title' => 'WhatsApp ilə sizə yeni kod göndərdik',
                        ],
                        'throttled' => [
                            'title' => 'Həddindən çox təkrar göndərmə cəhdi. Başqa kod istəməzdən əvvəl gözləyin.',
                        ],
                    ],
                ],
            ],
            'messages' => [
                'invalid' => 'Daxil etdiyiniz kod yanlışdır.',
            ],
        ],
    ],
];
