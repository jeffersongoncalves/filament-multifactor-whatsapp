<?php

return [
    'label' => '設定',
    'modal' => [
        'heading' => 'WhatsApp認証コードの設定',
        'description' => 'ログインや機密性の高い操作を行うたびに、WhatsAppでお送りする6桁のコードを入力する必要があります。設定を完了するには、WhatsAppで6桁のコードを確認してください。',
        'form' => [
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
        'actions' => [
            'submit' => [
                'label' => 'WhatsApp認証コードを有効にする',
            ],
        ],
    ],
    'notifications' => [
        'enabled' => [
            'title' => 'WhatsApp認証コードが有効になりました',
        ],
    ],
];
