<?php

return [
    'label' => '해제',
    'modal' => [
        'heading' => 'WhatsApp 인증 코드 비활성화',
        'description' => 'WhatsApp 인증 코드 수신을 중지하시겠습니까? 비활성화하면 계정의 추가 보안 계층이 제거됩니다.',
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
                'label' => 'WhatsApp 인증 코드 비활성화',
            ],
        ],
    ],
    'notifications' => [
        'disabled' => [
            'title' => 'WhatsApp 인증 코드가 비활성화되었습니다',
        ],
    ],
];
