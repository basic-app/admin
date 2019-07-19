<?php

namespace BasicApp\Admin\Config;

use BasicApp\Admin\AdminService;
use BasicApp\Admins\Models\AdminModel;

use BasicApp\CoolAdminTheme\Theme as AdminTheme;

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
            $return = new AdminTheme;

            $return->baseUrl = '/components/CoolAdmin';

            return $return;
        }

        return static::getSharedInstance('adminTheme');
    }

}