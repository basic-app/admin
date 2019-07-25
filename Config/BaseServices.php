<?php

namespace BasicApp\Admin\Config;

use BasicApp\Admins\Models\AdminModel;
use Exception;

abstract class BaseServices extends \CodeIgniter\Config\BaseService
{

    public static function currentAdmin($getShared = true)
    {
        if (!$getShared)
        {
            return AdminModel::getCurrentUser();
        }

        return static::getSharedInstance('currentAdmin');   
    }

    public static function adminTheme($getShared = true)
    {
        if (!$getShared)
        {
            $config = new AdminConfig;

            $themeClass = $config->adminTheme;

            if (!$themeClass)
            {
                throw new Exception('Admin theme is not defined.');
            }

            $theme = new $themeClass;

            return $theme;
        }

        return static::getSharedInstance('adminTheme');
    }

}