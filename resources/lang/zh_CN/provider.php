<?php

return [
    'management_schema' => [
        'actions' => [
            'label' => 'WhatsApp 验证码',
            'below_content' => '在登录时接收发送到您 WhatsApp 的临时代码以验证身份。',
            'messages' => [
                'enabled' => '已启用',
                'disabled' => '已禁用',
            ],
        ],
    ],
    'login_form' => [
        'label' => '向您的 WhatsApp 发送验证码',
        'code' => [
            'label' => '输入我们通过 WhatsApp 发送给您的 6 位代码',
            'validation_attribute' => '代码',
            'actions' => [
                'resend' => [
                    'label' => '通过 WhatsApp 发送新代码',
                    'notifications' => [
                        'resent' => [
                            'title' => '我们已通过 WhatsApp 向您发送了新代码',
                        ],
                        'throttled' => [
                            'title' => '重新发送尝试过多。请稍候再请求新的代码。',
                        ],
                    ],
                ],
            ],
            'messages' => [
                'invalid' => '您输入的代码无效。',
            ],
        ],
    ],
];
