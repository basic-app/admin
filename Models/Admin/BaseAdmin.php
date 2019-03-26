<?php

namespace BasicApp\Admin\Models\Admin;

abstract class BaseAdmin extends \BasicApp\Admin\Models\Admin
{

	protected $modelClass = AdminModel::class;

	public $admin_new_password; // virtual

}