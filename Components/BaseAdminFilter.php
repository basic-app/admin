<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Admin\Components;

use Exception;

abstract class BaseAdminFilter extends \BasicApp\Filters\AuthFilter
{

    public $userService = 'admin';

    public function __construct()
    {
        parent::__construct();

        $service = $this->getUserService();

        if (!$service)
        {
            $error = 'Admin service is required.';

            throw new Exception($error);
        }
    }

}