<?php

namespace BasicApp\Admin\Models;

abstract class BaseAdminRoleModel extends \BasicApp\Core\Model
{

	protected $table = 'admin_roles';

	protected $primaryKey = 'role_id';

	protected $returnType = AdminRole::class;

    protected $labels = [
        'role_name' => 'Name',
        'role_uid' => 'UID'
    ];

    protected $translations = 'admin-roles';

	public static function getRole(string $uid, bool $create = false, array $params = [])
	{
		return static::getEntity(['role_uid' => $uid], $create, $params);
	}

    public static function getListItems($return = [])
    { 
        foreach(static::factory()->orderBy('role_name ASC')->findAll() as $model)
        {
            $return[$model->role_id] = $model->role_name;
        }

        return $return;
    }

	public static function install()
	{
		static $installed = false;

		if ($installed)
		{
			return;
		}

		static::getRole(AdminModel::ADMIN_ROLE, true, ['role_name' => 'Admin']);

		$installed = true;
	}

}