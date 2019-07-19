<?php

namespace BasicApp\Admin\Forms;

abstract class BaseAdminLogin extends \BasicApp\Core\Entity
{

	protected $modelClass = AdminLoginForm::class;

	public $login;

	public $password;

	public $remember_me;

}