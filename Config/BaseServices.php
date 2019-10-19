<?php

namespace BasicApp\Admin\Config;

use Exception;

abstract class BaseServices extends \CodeIgniter\Config\BaseService
{

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