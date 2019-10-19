<?php

namespace BasicApp\Admin\Config;

use Exception;
use Config\App as AppConfig;
use BasicApp\Admin\Components\AdminService;
use BasicApp\Admin\Models\AdminModel;

abstract class BaseServices extends \CodeIgniter\Config\BaseService
{

    public static function admin($getShared = true)
    {
        if (!$getShared)
        {
            $session = service('session');

            $appConfig = config(AppConfig::class);

            $adminService = new AdminService(AdminModel::class, $session, $appConfig);

            return $adminService;
        }

        return static::getSharedInstance(__FUNCTION__);
    }

    public static function adminTheme($getShared = true)
    {
        if (!$getShared)
        {
            $config = new Admin;

            $themeClass = $config->adminTheme;

            if (!$themeClass)
            {
                throw new Exception('Admin theme not found. Install "basic-app/theme-cool-admin" package.');
            }

            $theme = new $themeClass;

            return $theme;
        }

        return static::getSharedInstance('adminTheme');
    }

}