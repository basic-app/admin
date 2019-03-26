<?php

namespace BasicApp\Admin\Models;

abstract class BaseAdmin extends \BasicApp\Core\Entity
{

	protected $modelClass = AdminModel::class;

	public $admin_id;

	public $admin_role_id;

	public $admin_created_at;

	public $admin_updated_at;

	public $admin_email = '';

	public $admin_name = '';

	public $admin_password_hash;

	public $admin_avatar = '';

	public function avatarUrl($default = null)
	{
		if (! $this->admin_avatar)
		{
			return $default;
		}

		return base_url('uploaded/admins/' . $this->admin_avatar);
	}

}