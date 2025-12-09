<?php

return [
    'label' => '设置',
    'modal' => [
        'heading' => '设置 WhatsApp 验证码',
        'description' => '每次登录或执行敏感操作时，您都需要输入我们通过 WhatsApp 发送给您的 6 位代码。请检查您的 WhatsApp 获取 6 位代码以完成设置。',
        'form' => [
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
        'actions' => [
            'submit' => [
                'label' => '启用 WhatsApp 验证码',
            ],
        ],
    ],
    'notifications' => [
        'enabled' => [
            'title' => 'WhatsApp 验证码已启用',
        ],
    ],
];
