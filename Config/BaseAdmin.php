<?php

namespace BasicApp\Admin\Config;

use Config\App as AppConfig;
use BasicApp\Core\DatabaseConfigModel;
use BasicApp\Admin\Forms\AdminConfigForm;

abstract class BaseAdmin extends \BasicApp\Config\DatabaseConfig
{

    protected $modelClass = AdminConfigForm::class;

    public $adminTheme;

    public $admins = [];

    public function __construct()
    {
        parent::__construct();

        $list = $this->adminThemes();

        if (!$this->adminTheme || !array_key_exists($this->adminTheme, $list))
        {
            $this->adminTheme = $this->getDefaultAdminTheme();
        }
    }

    public function adminThemes() : array
    {
        $modelClass = $this->modelClass;

        return $modelClass::adminThemes();
    }

    public function getDefaultAdminTheme() : string
    {
        $items = static::adminThemes();

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
             $items = static::adminThemes();

             if (array_key_exists($this->adminTheme, $items))
             {
                return $items[$this->adminTheme];
             }
        }

        return '';
    }

}