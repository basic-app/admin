<?php

$routes->add('admin/login', 'BasicApp\Admin\Controllers\Login::index');
$routes->add('admin/logout', 'BasicApp\Admin\Controllers\Logout::index');
$routes->add('admin/admin', 'BasicApp\Admin\Controllers\Admin::index');
$routes->add('admin/admin/(:segment)', 'BasicApp\Admin\Controllers\Admin::$1');
$routes->add('admin/admin-role', 'BasicApp\Admin\Controllers\AdminRole::index');
$routes->add('admin/admin-role/(:segment)', 'BasicApp\Admin\Controllers\AdminRole::$1');