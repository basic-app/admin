<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
namespace BasicApp\Admin\Config;

use BasicApp\Admin\Forms\AdminConfigForm;

class Admin extends \BasicApp\Config\BaseConfig
{

    protected $modelClass = AdminConfigForm::class;

    public $adminTheme;

    public $login;

    public $passwordHash;

    public $loginUrl;

    public $logoutUrl;

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