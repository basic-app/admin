<?php
/**
 * @copyright Copyright (c) 2018-2019 Basic App Dev Team
 * @link http://basic-app.com
 * @license MIT License
 */
namespace BasicApp\Admin;

use BasicApp\Core\Event;

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

    public static function adminThemes($return = [])
    {
        // TODO: remove this
        $return['BasicApp\CoolAdminTheme\Theme'] = 'Cool Admin'; 

        $event = new Event;

        $event->return = $return;

        static::trigger(static::EVENT_ADMIN_THEMES, $event);

        return $event->return;
    }


}