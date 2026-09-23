<?php

return [
    'management_schema' => [
        'actions' => [
            'label' => 'WhatsApp सत्यापन कोड',
            'below_content' => 'लॉगिन के दौरान अपनी पहचान सत्यापित करने के लिए अपने WhatsApp पर एक अस्थायी कोड प्राप्त करें।',
            'messages' => [
                'enabled' => 'सक्षम',
                'disabled' => 'अक्षम',
            ],
        ],
    ],
    'login_form' => [
        'label' => 'अपने WhatsApp पर कोड भेजें',
        'code' => [
            'label' => 'WhatsApp द्वारा भेजा गया 6-अंकीय कोड दर्ज करें',
            'validation_attribute' => 'कोड',
            'actions' => [
                'resend' => [
                    'label' => 'WhatsApp द्वारा नया कोड भेजें',
                    'notifications' => [
                        'resent' => [
                            'title' => 'हमने आपको WhatsApp द्वारा नया कोड भेजा है',
                        ],
                        'throttled' => [
                            'title' => 'बहुत अधिक पुनः भेजने के प्रयास। कृपया दूसरा कोड माँगने से पहले प्रतीक्षा करें।',
                        ],
                    ],
                ],
            ],
            'messages' => [
                'invalid' => 'आपके द्वारा दर्ज किया गया कोड अमान्य है।',
            ],
        ],
    ],
];
