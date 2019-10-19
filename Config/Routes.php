<?php

$routes->add('admin/login', 'BasicApp\Admin\Controllers\Login::index');
$routes->add('admin/logout', 'BasicApp\Admin\Controllers\Logout::index');
$routes->add('admin/dashboard', 'BasicApp\Admin\Controllers\Dashboard::index');