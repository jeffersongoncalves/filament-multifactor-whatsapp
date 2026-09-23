<?php

return [
    'label' => 'Söndür',
    'modal' => [
        'heading' => 'WhatsApp təsdiq kodlarını deaktiv et',
        'description' => 'WhatsApp təsdiq kodlarını almağı dayandırmaq istədiyinizə əminsiniz? Bunu deaktiv etmək hesabınızdan əlavə təhlükəsizlik qatını siləcək.',
        'form' => [
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
        'actions' => [
            'submit' => [
                'label' => 'WhatsApp təsdiq kodlarını deaktiv et',
            ],
        ],
    ],
    'notifications' => [
        'disabled' => [
            'title' => 'WhatsApp təsdiq kodları deaktiv edildi',
        ],
    ],
];
