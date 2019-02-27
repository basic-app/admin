<?php

namespace BasicApp\Admin\Models;

abstract class BaseAdminLoginForm extends \BasicApp\Core\Model
{

	protected $returnType = AdminLoginEntity::class;

	protected $validationRules = [
		'login' => 'trim|required|min_length[5]|max_length[255]',
		'password' => 'trim|required|max_length[255]',
		'remember_me' => 'is_natural'
	];

	public static function getFieldLabels()
	{
		return [
			'login' => t('admin', 'Login'),
			'password' => t('admin', 'Password'),
			'remember_me' => t('admin', 'Remember Me')
		];
	}

	public static function findAdminByLogin($login)
	{
		$query = new AdminModel;

		$model = $query->where('admin_email', $login)->first();

		if (!$model)
		{
			$model = $query->where('admin_name', $login)->first();
		}

		return $model;
	}

}