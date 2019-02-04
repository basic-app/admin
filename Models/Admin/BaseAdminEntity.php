<?php

namespace BasicApp\Admin\Models\Admin;

abstract class BaseAdminEntity extends \BasicApp\Admin\Models\AdminEntity
{

	protected $modelClass = AdminModel::class;

	public $admin_new_password; // virtual

}