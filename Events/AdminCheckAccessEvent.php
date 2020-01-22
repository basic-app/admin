<?php

namespace BasicApp\Admin\Events;

class AdminCheckAccessEvent extends \BasicApp\Core\Event
{

    public $user;

    public $permission;

    public $result = false;

}