<?php

namespace BasicApp\Admin\Config;

use Config\App as AppConfig;
use BasicApp\Core\DatabaseConfigModel;
use BasicApp\Admin\Forms\AdminConfigForm;

abstract class BaseAdminConfig extends \BasicApp\Configs\DatabaseConfig
{

    protected $modelClass = AdminConfigForm::class;

    public $salt;

    public $adminTheme;

    public function __construct()
    {
        parent::__construct();

        if (!$this->salt)
        {
            $appConfig = config(AppConfig::class);

            if (property_exists($appConfig, 'salt'))
            {
                $this->salt = $appConfig->salt;
            }
            else
            {
                $this->salt = md5(rand(0, PHP_INT_SIZE) . time() . '' . rand(0, PHP_INT_SIZE));
            }

            AdminConfigForm::setValue(static::class, 'salt', $this->salt);
        }

        $list = $this->adminThemeList();

        if (!$this->adminTheme || !array_key_exists($this->theme, $list))
        {
            $this->adminTheme = $this->getDefaultAdminTheme();
        }
    }

    public function adminThemeList() : array
    {
        $modelClass = $this->modelClass;

        return $modelClass::adminThemeList();
    }

    public function getDefaultTheme() : string
    {
        $items = static::adminThemeList();

        if (count($items) > 0)
        {
            $items = array_keys($items);

            return array_shift($items);
        }

        return '';
    }

    public function getAdminThemeName() : string
    {
        if ($this->theme)
        {
             $items = static::adminThemeList();

             if (array_key_exists($this->adminTheme, $items))
             {
                return $items[$this->adminTheme];
             }
        }

        return '';
    }

}