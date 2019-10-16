<?php
/**
 * @copyright Copyright (c) 2018-2019 Basic App Dev Team
 * @link http://basic-app.com
 * @license MIT License
 */
namespace BasicApp\Admin;

abstract class BaseAdminFilter extends \BasicApp\Core\AuthFilter
{

    public $userService = 'admin';

}