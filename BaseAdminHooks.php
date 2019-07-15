<?php
/**
 * @copyright Copyright (c) 2018-2019 Basic App Dev Team
 * @link http://basic-app.com
 * @license MIT License
 */
namespace BasicApp\Admin;

use BasicApp\Admin\Models\AdminModel;
use BasicApp\Admin\Models\AdminRoleModel;
use BasicApp\Admin\Models\AdminConfigModel;
use BasicApp\Admin\Controllers\Config as ConfigController;
use BasicApp\Admin\Controllers\Admin as AdminController;
use BasicApp\Admin\Controllers\AdminRole as AdminRoleController;
use BasicApp\Helpers\Url;

abstract class BaseAdminHooks
{

    public static function install()
    {
        static $installed = false;

        if ($installed)
        {
            return;
        }

        $installed = true;

        AdminRoleModel::install();

        $adminsCount = AdminModel::factory()->countAllResults();

        if ($adminsCount > 0)
        {
            return;
        }

        $role = AdminRoleModel::getRole(static::ADMIN_ROLE);

        $model = AdminModel::factory();

        $model->protect(false);

        $model->insert([
            'admin_role_id' => $role->role_id,
            'admin_name' => 'admin',
            'admin_password_hash' => AdminModel::encodePassword('admin')
        ]);

        $model->protect(true);
    }

    public static function preSystem()
    {
        helper(['form']);
    }

    public static function adminOptionsMenu($menu)
    {
        if (ConfigController::checkAccess())
        {
            $menu->items[AdminConfigModel::class] = [
                'label' => t('admin.menu', 'Admin'),
                'icon' => 'fa fa-users',
                'url' => Url::createUrl('admin/config', ['class' => AdminConfigModel::class])
            ];        
        }
    }

    public static function adminMainMenu($menu)
    {
        if (AdminController::checkAccess())
        {
            $menu->items['admin'] = [
                'url'   => Url::createUrl('admin/admin'),
                'label' => t('admin.menu', 'Admins'),
                'icon'  => 'fa fa-users'
            ];
        }

        if (AdminRoleController::checkAccess())
        {
            $menu->items['system']['items']['admin-role'] = [
                'url'   => Url::createUrl('admin/admin-role'),
                'label' => t('admin.menu', 'Admin Roles'),
                'icon'  => 'fa fa-users'
            ];
        }
    }

}