<?php

return [
    'management_schema' => [
        'actions' => [
            'label' => 'WhatsApp認証コード',
            'below_content' => 'ログイン時に本人確認のため、WhatsApp に一時コードを受け取ります。',
            'messages' => [
                'enabled' => '有効',
                'disabled' => '無効',
            ],
        ],
    ],
    'login_form' => [
        'label' => 'WhatsApp にコードを送信',
        'code' => [
            'label' => 'WhatsAppで送信した6桁のコードを入力してください',
            'validation_attribute' => 'コード',
            'actions' => [
                'resend' => [
                    'label' => 'WhatsAppで新しいコードを送信',
                    'notifications' => [
                        'resent' => [
                            'title' => 'WhatsAppで新しいコードを送信しました',
                        ],
                        'throttled' => [
                            'title' => '再送の試行が多すぎます。別のコードをリクエストする前にお待ちください。',
                        ],
                    ],
                ],
            ],
            'messages' => [
                'invalid' => '入力したコードが無効です。',
            ],
        ],
    ],
];
