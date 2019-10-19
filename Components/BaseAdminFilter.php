<?php
/**
 * @copyright Copyright (c) 2018-2019 Basic App Dev Team
 * @link http://basic-app.com
 * @license MIT License
 */
namespace BasicApp\Admin\Components;

use Exception;

abstract class BaseAdminFilter extends \BasicApp\Core\AuthFilter
{

    public $userService = 'admin';

    public function __construct()
    {
        parent::__construct();

        $service = $this->getUserService();

        if (!$service)
        {
            $error = 'Admin service not found. Install "basic-app/module-admin" or "basic-app/module-admin-simple" package.';

            throw new Exception($error);
        }
    }

}