<?php
/**
 * @package Basic App Admin
 * @license MIT License
 * @link    http://basic-app.com
 */
namespace BasicApp\Admin\Forms;

use BasicApp\Admin\AdminEvents;
use BasicApp\Admin\Config\AdminConfig;
use BasicApp\Core\Form;

abstract class BaseAdminConfigForm extends \BasicApp\Configs\DatabaseConfigForm
{

    protected $returnType = AdminConfig::class;

    protected $validationRules = [
        'adminTheme' => [
            'rules' => 'max_length[255]|required',
            'label' => 'Admin Theme'
        ]
    ];

    protected $translations = 'admin';

    public static function getFormName()
    {
        return t('admin.menu', 'Admin');
    }

    public function renderFields(Form $form)
    {
        $return = '';

        $return .= $form->dropdown('adminTheme', static::adminThemeList(['' => '...']));

        return $return;
    }

    public static function adminThemeList($return = [])
    {
        return AdminEvents::adminThemeList($return);
    }

}