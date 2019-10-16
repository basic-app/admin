<?php

namespace BasicApp\Admin\Config;

use Exception;

abstract class BaseServices extends \CodeIgniter\Config\BaseService
{

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