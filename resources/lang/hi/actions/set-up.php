<?php

return [
    'label' => 'सेट अप करें',
    'modal' => [
        'heading' => 'WhatsApp सत्यापन कोड सेट अप करें',
        'description' => 'हर बार साइन इन करने या संवेदनशील कार्य करने पर आपको WhatsApp द्वारा भेजा गया 6-अंकीय कोड दर्ज करना होगा। सेटअप पूरा करने के लिए अपने WhatsApp में 6-अंकीय कोड देखें।',
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
                'label' => 'WhatsApp सत्यापन कोड सक्षम करें',
            ],
        ],
    ],
    'notifications' => [
        'enabled' => [
            'title' => 'WhatsApp सत्यापन कोड सक्षम कर दिए गए हैं',
        ],
    ],
];
