<?php

namespace BasicApp\Admin\Config;

use BasicApp\Admin\AdminService;
use stdClass;
use BasicApp\CoolAdminTheme\Theme as AdminTheme;

abstract class BaseServices extends \CodeIgniter\Config\BaseService
{

    public static function admin($getShared = true)
    {
        if (!$getShared)
        {
            return new AdminService(new stdClass);
        }

        return static::getSharedInstance('admin');
    }

    public static function adminTheme($getShared = true)
    {
        if (!$getShared)
        {
            $return = new AdminTheme;

            $return->baseUrl = '/components/CoolAdmin';

            return $return;
        }

        return static::getSharedInstance('adminTheme');
    }

}