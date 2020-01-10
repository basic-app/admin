<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Admin\Filters;

use Exception;

abstract class BaseAdminFilter extends \BasicApp\Filters\AuthFilter
{

    public $userService = 'admin';

}