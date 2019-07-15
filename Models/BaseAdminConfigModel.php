<?php
/**
 * @package Basic App Admin
 * @license MIT License
 * @link    http://basic-app.com
 */
namespace BasicApp\Admin\Models;

use BasicApp\Admin\Config\AdminConfig;

abstract class BaseAdminConfigModel extends \BasicApp\Core\DatabaseConfigModel
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

    public static function getFormFields($model)
    {
        return [
            [
                'type' => 'select',
                'name' => 'adminTheme',
                'label' => static::label('adminTheme'),
                'value' => $model->adminTheme,
                'items' => static::adminThemeListItems()
            ]
        ];
    }

    public static function adminThemeListItems()
    {
        // TODO: admin_themes event HERE

        return [
            'components/CoolAdmin' => 'Theme\CoolAdmin'
        ];
    }

}