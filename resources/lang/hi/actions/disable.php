<?php

return [
    'label' => 'बंद करें',
    'modal' => [
        'heading' => 'WhatsApp सत्यापन कोड अक्षम करें',
        'description' => 'क्या आप वाकई WhatsApp सत्यापन कोड प्राप्त करना बंद करना चाहते हैं? इसे अक्षम करने से आपके खाते से सुरक्षा की एक अतिरिक्त परत हट जाएगी।',
        'form' => [
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
        'actions' => [
            'submit' => [
                'label' => 'WhatsApp सत्यापन कोड अक्षम करें',
            ],
        ],
    ],
    'notifications' => [
        'disabled' => [
            'title' => 'WhatsApp सत्यापन कोड अक्षम कर दिए गए हैं',
        ],
    ],
];
