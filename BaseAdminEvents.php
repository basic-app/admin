<?php
/**
 * @package Basic App Admin
 * @license MIT License
 * @link    http://basic-app.com
 */
namespace BasicApp\Admin;

abstract class BaseAdminEvents extends \CodeIgniter\Events\Events
{

    const EVENT_ADMIN_MAIN_MENU = 'admin_main_menu';

    const EVENT_ADMIN_OPTIONS_MENU = 'admin_options_menu';

    const EVENT_ADMIN_THEMES = 'admin_themes';

    public static function onAdminThemes($callback)
    {
        static::on(static::EVENT_ADMIN_THEMES, $callback);
    }

    public static function onAdminMainMenu($callback)
    {
        static::on(static::EVENT_ADMIN_MAIN_MENU, $callback);
    }

    public static function onAdminOptionsMenu($callback)
    {
        static::on(static::EVENT_ADMIN_OPTIONS_MENU, $callback);
    }

}