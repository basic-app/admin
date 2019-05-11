<?php

namespace BasicApp\Admin\Models\Admin;

use BasicApp\Core\Behaviors\UploadBehavior;
use BasicApp\Core\Behaviors\NullBehavior;

abstract class BaseAdminModel extends \BasicApp\Admin\Models\AdminModel
{

    const PASSWORD_REQUIRED = true;

	protected $returnType = Admin::class;

	protected $allowedFields = [
		'admin_email',
		'admin_name',
		'admin_password_hash',
		'admin_avatar',		
		'admin_role_id'
	];

	protected $validationRules = [
		'admin_role_id' => 'required',
		'admin_email' => 'trim|max_length[255]',
		'admin_name' => 'trim|required|max_length[255]',
		'admin_new_password' => 'trim|max_length[255]',
		'admin_avatar_file' => 'uploaded[admin_avatar_file]|max_size[admin_avatar_file,6024]|ext_in[admin_avatar_file,jpg,png,gif]|is_image[admin_avatar_file]',
	];

    public function prepareValidationRules(array $params) : array
    {
        // if file not uploaded, then we don't need to validate it

        if (!array_key_exists('admin_avatar_file', $_FILES))
        {
            unset($params['rules']['admin_avatar_file']); 
        }

        // validate unique e-mail if field is not empty

        if (array_value($params['data'], 'admin_email'))
        {
            $params['rules']['admin_email'] .= '|is_unique[admins.admin_email,admin_id,{admin_id}]';
        } 

        // set min length if field is defined

        if (array_value($params['data'], 'admin_new_password'))
        {
            $params['rules']['admin_new_password'] .= '|min_length[5]';
        }

        // new password is required for new users

        if (static::PASSWORD_REQUIRED)
        {
            if (!array_value($params['data'], 'admin_id'))
            {
                $params['rules']['admin_new_password'] .= '|required|min_length[5]';
            }
        }

        return $params;
    }

    protected function beforeSave(array $params) : array
    {
        $params = parent::beforeSave($params);

        if (($params['data'])->admin_new_password)
        {
            ($params['data'])->admin_password_hash = static::encodePassword(($params['data'])->admin_new_password);
        }

        return $params;
    }

	public static function getLabels()
	{
		$return = parent::getLabels();

		$return['admin_new_password'] = t('admin', 'Password');

		$return['admin_avatar_file'] = $return['admin_avatar'];

		return $return;
	}

    public function behaviors() : array
    {
        return [
            'upload_avatar' => [
                'class' => UploadBehavior::class,
                'path' => FCPATH . 'uploaded/admins',
                'field' => 'admin_avatar',
                'input' => 'admin_avatar_file',
                'square' => true
            ],
            'null' => [
                'class' => NullBehavior::class, 
                'fields' => [
                    'admin_email'
                ]
            ]
        ];
    }

}