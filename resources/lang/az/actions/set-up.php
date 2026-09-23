<?php

return [
    'label' => 'Quraşdır',
    'modal' => [
        'heading' => 'WhatsApp təsdiq kodlarını quraşdırın',
        'description' => 'Hər dəfə daxil olanda və ya həssas əməliyyatlar icra edəndə WhatsApp ilə göndərdiyimiz 6 rəqəmli kodu daxil etməli olacaqsınız. Quraşdırmanı tamamlamaq üçün WhatsApp-ınızda 6 rəqəmli kodu yoxlayın.',
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
                'label' => 'WhatsApp təsdiq kodlarını aktiv et',
            ],
        ],
    ],
    'notifications' => [
        'enabled' => [
            'title' => 'WhatsApp təsdiq kodları aktiv edildi',
        ],
    ],
];
