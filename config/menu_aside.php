<?php

// Aside menu

return [



    'items' => [

        "administrator" => [

            [

                'title' => 'Dashboard',

                'root' => true,

                'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*

                'page' => 'administrator/dashboard',

                'new-tab' => false,

            ],

            [

                'title' => 'Users',

                'root' => true,

                'icon' => 'flaticon-user', // or can be 'flaticon-home' or any flaticon-*

                'page' => 'administrator/users',

                'new-tab' => false,

            ],

            [

                'title' => 'Curriculums',

                'root' => true,

                'icon' => 'flaticon2-open-text-book', // or can be 'flaticon-home' or any flaticon-*

                'page' => 'administrator/curriculum',

                'new-tab' => false,

            ],

            [

                'title' => 'Training Schedules',

                'root' => true,

                'icon' => 'flaticon2-time', // or can be 'flaticon-home' or any flaticon-*

                'page' => 'administrator/training-schedules',

                'new-tab' => false,

            ],

            [

                'title' => 'Partners\' Deals',

                'root' => true,

                'icon' => 'flaticon-users', // or can be 'flaticon-home' or any flaticon-*

                'page' => 'administrator/partners',

                'new-tab' => false,

            ],

            [

                'title' => 'Public Classes',

                'root' => true,

                'icon' => 'fas fa-book', // or can be 'flaticon-home' or any flaticon-*

                'page' => 'administrator/public-classes',

                'new-tab' => false,

            ],

            [

                'title' => 'Payment Transactions',

                'root' => true,

                'icon' => 'fas fa-wallet', // or can be 'flaticon-home' or any flaticon-*

                'page' => 'administrator/payment-transaction',

                'new-tab' => false,

            ],

            [

                'title' => 'Configurations & Settings',

                'icon' => 'media/svg/icons/General/Settings-2.svg',

                'bullet' => 'dot',

                'root' => true,

                'submenu' => [

                    [

                        'title' => 'User Roles',

                        'page' => 'administrator/settings/user-roles'

                    ],

                    [

                        'title' => 'Subjects',

                        'page' => 'administrator/settings/subjects'

                    ],

                    [

                        'title' => 'Levels',

                        'page' => 'administrator/settings/levels'

                    ],

                    [

                        'title' => 'Requirements',

                        'page' => 'administrator/settings/requirements'

                    ],

                ]

            ]

        ],

        "trainer" => [

            [

                'title' => 'Dashboard',

                'root' => true,

                'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*

                'page' => 'trainer/dashboard',

                'new-tab' => false,

            ],

            [

                'title' => 'Lessons',

                'root' => true,

                'icon' => 'fas fa-book', // or can be 'flaticon-home' or any flaticon-*

                'page' => 'trainer/lessons',

                'new-tab' => false,

            ],

        ],

        "teacher" => [

            [

                'title' => 'Dashboard',

                'root' => true,

                'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*

                'page' => 'teacher/dashboard',

                'new-tab' => false,

            ],

            [

                'title' => 'Curriculums',

                'root' => true,

                'icon' => 'flaticon2-open-text-book', // or can be 'flaticon-home' or any flaticon-*

                'page' => 'teacher/curriculum',

                'new-tab' => false,

            ],

            [

                'title' => 'Private Classes',

                'root' => true,

                'icon' => 'fas fa-book', // or can be 'flaticon-home' or any flaticon-*

                'page' => 'teacher/private-classes',

                'new-tab' => false,

            ],

            [

                'title' => 'Students',

                'root' => true,

                'icon' => 'flaticon-users', // or can be 'flaticon-home' or any flaticon-*

                'page' => 'teacher/students',

                'new-tab' => false,

            ],


            [

                'title' => 'Job Openings',

                'root' => true,

                'icon' => 'flaticon2-digital-marketing', // or can be 'flaticon-home' or any flaticon-*

                'page' => 'teacher/job-openings',

                'new-tab' => false,

            ],

            [

                'title' => 'Payment Transactions',

                'root' => true,

                'icon' => 'fas fa-wallet', // or can be 'flaticon-home' or any flaticon-*

                'page' => 'teacher/payment-transactions',

                'new-tab' => false,

            ],

        ],

        "student" => [

            [

                'title' => 'Dashboard',

                'root' => true,

                'icon' => 'media/svg/icons/Design/Layers.svg', // or can be 'flaticon-home' or any flaticon-*

                'page' => 'student/dashboard',

                'new-tab' => false,

            ],

            [

                'title' => 'Classes',

                'root' => true,

                'icon' => 'fas fa-book', // or can be 'flaticon-home' or any flaticon-*

                'page' => 'student/classes',

                'new-tab' => false,

            ],

            [

                'title' => 'Payment Transactions',

                'root' => true,

                'icon' => 'fas fa-wallet', // or can be 'flaticon-home' or any flaticon-*

                'page' => 'student/payment-transactions',

                'new-tab' => false,

            ],

        ]

    ]



];

