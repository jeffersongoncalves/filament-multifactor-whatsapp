<?php

return [
    'label' => '無効化',
    'modal' => [
        'heading' => 'WhatsApp認証コードを無効にする',
        'description' => 'WhatsAppの認証コードの受信を停止してもよろしいですか？無効にすると、アカウントの追加のセキュリティ層が削除されます。',
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
                'label' => 'WhatsApp認証コードを無効にする',
            ],
        ],
    ],
    'notifications' => [
        'disabled' => [
            'title' => 'WhatsApp認証コードを無効にしました',
        ],
    ],
];
