<?php

return [
    'label' => '关闭',
    'modal' => [
        'heading' => '禁用 WhatsApp 验证码',
        'description' => '确定要停止接收 WhatsApp 验证码吗？禁用后将移除您账户的额外安全层。',
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
                'label' => '禁用 WhatsApp 验证码',
            ],
        ],
    ],
    'notifications' => [
        'disabled' => [
            'title' => 'WhatsApp 验证码已被禁用',
        ],
    ],
];
