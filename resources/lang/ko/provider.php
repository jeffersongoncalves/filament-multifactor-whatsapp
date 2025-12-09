<?php

return [
    'management_schema' => [
        'actions' => [
            'label' => 'WhatsApp 인증 코드',
            'below_content' => '로그인 시 본인 확인을 위해 WhatsApp으로 일회용 코드를 받습니다.',
            'messages' => [
                'enabled' => '사용',
                'disabled' => '사용 안 함',
            ],
        ],
    ],
    'login_form' => [
        'label' => 'WhatsApp으로 코드 보내기',
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
];
