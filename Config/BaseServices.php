<?php

namespace BasicApp\Admin\Config;

use BasicApp\Admin\Components\AdminService;
use StdClass;

abstract class BaseServices extends \CodeIgniter\Config\BaseService
{

    public static function admin($getShared = false)
    {
        if (!$getShared)
        {
            return new AdminService(new StdClass);
        }

        return static::getSharedInstance('admin');
    }

}