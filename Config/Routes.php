<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
$routes->add('admin/login', '\BasicApp\Admin\Controllers\Login::index');
$routes->add('admin/logout', '\BasicApp\Admin\Controllers\Logout::index');
$routes->add('admin/dashboard', '\BasicApp\Admin\Controllers\Dashboard::index');

$routes->add('{locale}/admin/login', '\BasicApp\Admin\Controllers\Login::index');
$routes->add('{locale}/admin/logout', '\BasicApp\Admin\Controllers\Logout::index');
$routes->add('{locale}/admin/dashboard', '\BasicApp\Admin\Controllers\Dashboard::index');