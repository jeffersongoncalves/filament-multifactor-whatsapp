<?php

return [
    'label' => '설정',
    'modal' => [
        'heading' => 'WhatsApp 인증 코드 설정',
        'description' => '로그인하거나 민감한 작업을 수행할 때마다 WhatsApp으로 보내드리는 6자리 코드를 입력해야 합니다. 설정을 완료하려면 WhatsApp에서 6자리 코드를 확인하세요.',
        'form' => [
            'code' => [
                'label' => 'WhatsApp으로 보낸 6자리 코드를 입력하세요',
                'validation_attribute' => '코드',
                'actions' => [
                    'resend' => [
                        'label' => 'WhatsApp으로 새 코드 보내기',
                        'notifications' => [
                            'resent' => [
                                'title' => 'WhatsApp으로 새 코드를 보내드렸습니다',
                            ],
                            'throttled' => [
                                'title' => '재전송 시도가 너무 많습니다. 다른 코드를 요청하기 전에 잠시 기다려주세요.',
                            ],
                        ],
                    ],
                ],
                'messages' => [
                    'invalid' => '입력한 코드가 올바르지 않습니다.',
                ],
            ],
        ],
        'actions' => [
            'submit' => [
                'label' => 'WhatsApp 인증 코드 활성화',
            ],
        ],
    ],
    'notifications' => [
        'enabled' => [
            'title' => 'WhatsApp 인증 코드가 활성화되었습니다',
        ],
    ],
];
