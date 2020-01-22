<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Admin\Config;

use Exception;
use BasicApp\Admin\Libraries\AdminService;

class Services extends \CodeIgniter\Config\BaseService
{

    public static function admin($getShared = true)
    {
        if (!$getShared)
        {
            return new AdminService('admin_id');
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