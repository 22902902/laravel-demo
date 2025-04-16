<?php

return [
    'disable' => env('CAPTCHA_DISABLE', false),
    'characters' => '2346789abcdefghjmnpqrtuxyz', // 更简单的字符集

    'default' => [
        'length' => 4,    // 验证码长度
        'width' => 120,   // 图片宽度
        'height' => 36,   // 图片高度
        'quality' => 90,  // 图片质量
        'expire' => 2,   // 过期时间(分钟)
        'encrypt' => false,// 关闭加密（关键修复项）
        'session' => true,
    ],
    'math' => [
        'length' => 9,
        'width' => 120,
        'height' => 36,
        'quality' => 90,
        'math' => true,
    ],

    'flat' => [
        'length' => 6,
        'width' => 160,
        'height' => 46,
        'quality' => 90,
        'lines' => 6,
        'bgImage' => false,
        'bgColor' => '#ecf2f4',
        'fontColors' => ['#2c3e50', '#c0392b', '#16a085', '#c0392b', '#8e44ad', '#303f9f', '#f57c00', '#795548'],
        'contrast' => -5,
    ],
    'mini' => [
        'length' => 3,
        'width' => 60,
        'height' => 32,
    ],
    'inverse' => [
        'length' => 5,
        'width' => 120,
        'height' => 36,
        'quality' => 90,
        'sensitive' => true,
        'angle' => 12,
        'sharpen' => 10,
        'blur' => 2,
        'invert' => true,
        'contrast' => -5,
    ]
];
