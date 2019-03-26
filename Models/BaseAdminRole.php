<?php

namespace BasicApp\Admin\Models;

abstract class BaseAdminRole extends \BasicApp\Core\Entity
{

	protected $modelClass = AdminRoleModel::class;

	public $role_id;

	public $role_uid;

	public $role_name;

}