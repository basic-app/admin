<?php

use CodeIgniter\Events\Events;

use BasicApp\Admin\Models\AdminModel;
use BasicApp\Admin\Controllers\Admin;
use BasicApp\Admin\Controllers\AdminRole;

Events::on('install', function()
{
	AdminModel::install();
});

Events::on('admin_main_menu', function($menu)
{
    if (Admin::checkAccess())
    {
        $menu->items['admin'] = [
            'url'   => site_url('admin/admin'),
            'label' => t('admin.menu', 'Admins'),
            'icon'  => 'fa fa-users'
        ];
    }
});

Events::on('admin_options_menu', function($menu)
{
    if (AdminRole::checkAccess())
    {
        $menu->items['admin-role'] = [
            'url'   => site_url('admin/admin-role'),
            'label' => t('admin.menu', 'Admin Roles'),
            'icon'  => 'fa fa-users'
        ];
    }
});