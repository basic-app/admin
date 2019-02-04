<?php

namespace BasicApp\Admin\Models;

abstract class BaseAdminLoginEntity extends \BasicApp\Core\Entity
{

	protected $modelClass = AdminLoginForm::class;

	public $login;

	public $password;

	public $remember_me;

}