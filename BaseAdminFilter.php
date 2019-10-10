<?php
/**
 * @copyright Copyright (c) 2018-2019 Basic App Dev Team
 * @link http://basic-app.com
 * @license MIT License
 */
namespace BasicApp\Admin;

use BasicApp\Admin\Models\AdminModel;

abstract class BaseAdminFilter extends \BasicApp\Core\AuthFilter
{

    public static function getAuthModelClass()
    {
        return AdminModel::class;
    }

}