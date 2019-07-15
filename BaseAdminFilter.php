<?php
/**
 * @copyright Copyright (c) 2018-2019 Basic App Dev Team
 * @link http://basic-app.com
 * @license MIT License
 */
namespace BasicApp\Admin;

use BasicApp\Admin\Models\AdminModel;
use BasicApp\Core\AuthFilter;

abstract class BaseAdminFilter extends AuthFilter
{

    public static function getAuthModelClass()
    {
        return AdminModel::class;
    }

}