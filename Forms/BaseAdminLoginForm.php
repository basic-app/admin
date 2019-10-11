<?php

namespace BasicApp\Admin\Forms;

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
        'password' => 'Password'
        'remember_me' => 'Remember Me'
    ];

    protected $translations = 'admin';

}