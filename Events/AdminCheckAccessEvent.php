<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Admin\Events;

class AdminCheckAccessEvent extends \BasicApp\Core\Event
{

    public $user;

    public $permission;

    public $result = false;

}