<?php

namespace BasicApp\Admin\Models\Admin;

abstract class BaseAdminRoleModel extends \BasicApp\Admin\Models\AdminRoleModel
{

    protected $returnType = AdminRole::class;

	protected $allowedFields = [
		'role_name',
		'role_uid'
	];

	protected $validationRules = [
		'role_uid' => 'trim|required|alpha_dash|max_length[255]',
		'role_name' => 'trim|required|max_length[255]'
	];

}