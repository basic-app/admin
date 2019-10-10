<?php

namespace BasicApp\Admin\Forms;

abstract class BaseAdminLoginForm extends \BasicApp\Core\Model
{

	protected $returnType = AdminLogin::class;

	protected $validationRules = [
		'login' => [
            'rules' => 'required|min_length[5]|max_length[255]',
            'label' => 'Login'
        ],
		'password' => [
            'rules' => 'required|max_length[255]',
            'label' => 'Password'
        ],
		'remember_me' => [
            'rules' => 'is_natural',
            'label' => 'Remember Me'
        ]
	];

    protected $translations = 'admin';

}