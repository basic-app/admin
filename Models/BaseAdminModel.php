<?php

namespace BasicApp\Admin\Models;

use BasicApp\Core\AuthInterface;

abstract class BaseAdminModel extends \BasicApp\Core\Model implements AuthInterface
{

    use AdminAuthTrait;

	const ADMIN_ROLE = 'admin';

	protected $table = 'admins';

	protected $primaryKey = 'admin_id';

	protected $returnType = AdminEntity::class;

	protected $useTimestamps = true;

	protected $createdField = 'admin_created_at';

	protected $updatedField = 'admin_updated_at';
    
	public static function install()
	{
		static $installed = false;

		if ($installed)
		{
			return;
		}

		$installed = true;

		AdminRoleModel::install();

		$adminsCount = static::factory()->countAllResults();

		if ($adminsCount > 0)
		{
			return;
		}

		$role = AdminRoleModel::getRole(static::ADMIN_ROLE);

        $model = static::factory();

		$model->protect(false);

		$model->insert([
			'admin_role_id' => $role->role_id,
			'admin_name' => 'admin',
			'admin_password_hash' => static::encodeAdminPassword('admin')
		]);

		$model->protect(true);
	}

    public static function userHasRole($user, string $role)
    {
        $model = static::getUserRole($user);

        if ($model && ($model->role_uid == $role))
        {
            return true;
        }

        return false;
    }    

    public static function getUserRole($user)
    {
        return AdminRoleModel::factory()->where('role_id', $user->admin_role_id)->first();
    }

	public static function getFieldLabels()
	{
		return [
			'admin_id' => t('attribute', 'ID'),
			'admin_email' => t('attribute', 'E-mail'),
			'admin_name' => t('attribute', 'Name'),
			'admin_avatar' => t('attribute', 'Avatar'),
			'admin_role_id' => t('attribute', 'Role'),
			'admin_created_at' => t('attribute', 'Created At'),
			'admin_updated_at' => t('attribute', 'Updated At')
		];
	}

}