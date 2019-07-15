<?php

namespace BasicApp\Admin\Config;

use Config\App as AppConfig;
use BasicApp\Core\DatabaseConfigModel;

abstract class BaseAdminConfig extends \BasicApp\Core\DatabaseConfig
{

    public $salt;

    public $adminTheme;

    public function __construct()
    {
        parent::__construct();

        if (!$this->salt)
        {
            $appConfig = config(AppConfig::class);

            if (property_exists($appConfig, 'salt') && $appConfig->salt)
            {
                $this->salt = $appConfig->salt;
            }
            else
            {
                $this->salt = md5(rand(0, PHP_INT_SIZE) . time() . '' . rand(0, PHP_INT_SIZE));
            }

            DatabaseConfigModel::setValue(static::class, 'salt', $this->salt);
        }
    }

}