<?php

    return [
        [
            'label' => "Bảng điều khiển",
            'route' => 'admin.index',
            'icon' => 'fa-home'
        ],
        [
            'label' => 'Quản lý người dùng',
            'route' => 'category.index',
            'icon' => 'fa-user',
            'items' => [
                [
                    'label' => 'All User',
                    'route' => 'user.index'
                ],
                [
                    'label' => 'Add User',
                    'route' => 'user.create'
                ]
            ]
        ],
        [
            'label' => 'Quản lý danh mục',
            'route' => 'category.index',
            'icon' => 'fa-bars',
            'items' => [
                [
                    'label' => 'Tất cả danh mục',
                    'route' => 'category.index'
                ],
                [
                    'label' => 'Thêm danh mục',
                    'route' => 'category.create'
                ]
            ]
        ],
        [
            'label' => 'Quản lý sản phẩm',
            'route' => 'product.index',
            'icon' => 'fa-shopping-cart',
            'items' => [
                [
                    'label' => 'Tất cả sản phẩm',
                    'route' => 'product.index'
                ],
                [
                    'label' => 'Thêm sản phẩm',
                    'route' => 'product.create'
                ]
            ]
        ],
        [
            'label' => 'Quản lý bài viết',
            'route' => 'blog.index',
            'icon' => 'fa-newspaper',
            'items' => [
                [
                    'label' => 'Tất cả bài viết',
                    'route' => 'blog.index'
                ],
                [
                    'label' => 'Thêm bài viết',
                    'route' => 'blog.create'
                ]
            ]
        ]
    ]

?>