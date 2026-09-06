<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
use CodeIgniter\Router\RouteCollection;

// Admin
$routes->match(['GET', 'POST'], 'admin/login', '\BasicApp\Admin\Controllers\LoginController::index');
$routes->post('admin/logout', '\BasicApp\Admin\Controllers\LogoutController::index');
$routes->match(['GET', 'POST'], 'admin/admin-settings', '\BasicApp\Admin\Controllers\AdminSettingsController::index');