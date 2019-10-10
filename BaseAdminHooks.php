<?php
/**
 * @copyright Copyright (c) 2018-2019 Basic App Dev Team
 * @link http://basic-app.com
 * @license MIT License
 */
namespace BasicApp\Admin;

use BasicApp\Helpers\Url;
use BasicApp\Configs\Controllers\Admin\Config as ConfigController;
use BasicApp\Admin\Forms\AdminConfigForm;

abstract class BaseAdminHooks
{

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