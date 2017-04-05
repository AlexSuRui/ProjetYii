<?php
return [
    'upload' => [
        'type' => 2,
        'description' => 'upload a data file',
    ],
    'truncate' => [
        'type' => 2,
        'description' => 'truncate all data ',
    ],
    'admin' => [
        'type' => 1,
        'children' => [
            'upload',
            'truncate',
        ],
    ],
    'super admin' => [
        'type' => 1,
        'children' => [
            'upload',
            'truncate',
        ],
    ],
];
