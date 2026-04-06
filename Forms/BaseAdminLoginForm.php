<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Admin\Forms;

abstract class BaseAdminLoginForm extends \BasicApp\Core\Model
{

	protected $returnType = AdminLogin::class;

	protected $validationRules = [
		'login' => 'not_special_chars|min_length[5]|max_length[255]|required',
		'password' => 'max_length[255]|required'
	];

    protected $fieldLabels = [
        'login' => 'Login',
        'password' => 'Password'
    ];

    protected $langCategory = 'admin';

}