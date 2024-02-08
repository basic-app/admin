<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
namespace BasicApp\Admin\Config;

use Exception;
use BasicApp\Admin\Services\AdminAuthService;
use CodeIgniter\Config\BaseService;

class Services extends BaseService
{

    public static function adminAuth($getShared = true)
    {
        if (!$getShared)
        {
            $config = config('Admin');

            $params = [];

            if ($config->loginUrl)
            {
                $params['loginUrl'] = $config->loginUrl;
            }

            if ($config->logoutUrl)
            {
                $params['logoutUrl'] = $config->logoutUrl;
            }

            return new AdminAuthService($params);
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