<?php
/**
 * @copyright Copyright (c) 2018-2019 Basic App Dev Team
 * @link http://basic-app.com
 * @license MIT License
 */
namespace BasicApp\Admin;

use BasicApp\Helpers\Url;
use BasicApp\Configs\Controllers\Admin\Config as ConfigController;
use BasicApp\Admins\Controllers\Admin\Admins as AdminController;
use BasicApp\Admins\Controllers\Admin\AdminRole as AdminRoleController;
use BasicApp\Admins\Models\AdminModel;
use BasicApp\Admins\Models\AdminRoleModel;
use BasicApp\Admin\Forms\AdminConfigForm;

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

        $role = AdminRoleModel::getRole(AdminController::ROLE_ADMIN);

        $model = AdminModel::factory();

        $model->protect(false);

        $model->insert([
            'admin_role_id' => $role->role_id,
            'admin_name' => 'admin',
            'admin_password_hash' => AdminModel::encodePassword('admin')
        ]);

        $model->protect(true);
    }

    public static function adminOptionsMenu($menu)
    {
        if (ConfigController::checkAccess())
        {
            $menu->items[AdminConfigForm::class] = [
                'label' => t('admin.menu', 'Admin'),
                'icon' => 'fa fa-users',
                'url' => Url::createUrl('admin/config', ['class' => AdminConfigForm::class])
            ];        
        }
    }

}