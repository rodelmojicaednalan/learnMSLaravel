<?php
// Header menu
return [

    'items' => [
        [
            'title' => 'Dashboard',
            'root' => true,
            'page' => 'administrator/dashboard',
            'new-tab' => false,
        ],
        [
            'title' => 'Trainer',
            'root' => true,
            'page' => 'trainer/dashboard',
            'new-tab' => false,
        ],
        [
            'title' => 'Teacher',
            'root' => true,
            'page' => 'teacher/dashboard',
            'new-tab' => false,
        ],
        [
            'title' => 'Parents / Students',
            'root' => true,
            'page' => 'student/dashboard',
            'new-tab' => false,
        ]
    ]

];
