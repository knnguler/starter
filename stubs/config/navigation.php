<?php

return [
    'admin' => [
        [
            'type' => 'group',
            'items' => [
                [
                    'id' => 'home',
                    'type' => 'menu',
                    'label' => 'Home',
                    'icon' => 'home',
                    'route' => 'admin.home',
                ],
            ],
        ],
        [
            'type' => 'group',
            'label' => 'Management',
            'items' => [
                [
                    'id' => 'users',
                    'type' => 'menu',
                    'label' => 'Users',
                    'icon' => 'users',
                    'route' => 'admin.user.index',
                ],
                [
                    'id' => 'settings',
                    'type' => 'menu',
                    'label' => 'Settings',
                    'icon' => 'effect',
                    'route' => 'admin.settings',
                ],
            ],
        ],
    ],
];
