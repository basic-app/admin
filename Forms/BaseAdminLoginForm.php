<?php

namespace BasicApp\Admin\Forms;

//use BasicApp\Admins\Models\AdminModel;

abstract class BaseAdminLoginForm extends \BasicApp\Core\Model
{

	protected $returnType = AdminLogin::class;

	protected $validationRules = [
		'login' => 'required|min_length[5]|max_length[255]',
		'password' => 'required|max_length[255]',
		'remember_me' => 'is_natural'
	];

    protected $labels = [
        'login' => 'Login',
        'password' => 'Password',
        'remember_me' => 'Remember Me'
    ];

    protected $translations = 'admin';

    /*
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
    */

}