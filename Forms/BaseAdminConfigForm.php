<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Admin\Forms;

use BasicApp\Admin\AdminEvents;
use BasicApp\Admin\Config\Admin as AdminConfig;
use BasicApp\Core\Form;

abstract class BaseAdminConfigForm extends \BasicApp\Config\BaseConfigForm
{

    protected $returnType = AdminConfig::class;

    protected $validationRules = [
        'adminTheme' => 'max_length[255]|required'
    ];

    protected $labels = [
        'adminTheme' => 'Admin Theme'
    ];

    protected $translations = 'admin';

    public static function getFormName()
    {
        return t('admin.menu', 'Admin');
    }

    public function renderForm(Form $form, $data)
    {
        $return = '';

        $return .= $form->dropdownGroup($data, 'adminTheme', static::adminThemes(['' => '...']));

        return $return;
    }

    public static function adminThemes($return = [])
    {
        return AdminEvents::themes($return);
    }

}