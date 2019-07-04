<?php

const SCREEN_OPTIONS = [
    'CONSOLE' => [
        'admin-users' => ['Quản trị viên', 'user'],
        'pets' => ['Thú cưng', 'piggy-bank'],
        'categories' => ['Danh mục', 'book'],
        'product-types' => ['Loại sản phẩm', 'th-list'],
        'products' => ['Sản phẩm', 'th'],
        'orders' => ['Quản lý hóa đơn', 'shopping-cart']
    ]
];
const SCREEN_TYPE_CONSOLE = 'CONSOLE';
const ADD = 'add';
const EDIT = 'edit';
const DELETE = 'delete';
const INFO = 'info';
const WARNING = 'warning';
const DELETE_ERROR = 'delete_error';
const LOGIN = 'login';
const PASSWORD_ERROR = 'password_error';
const ORDER_SUCCESS = 'order_success';