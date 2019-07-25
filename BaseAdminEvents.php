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

    const EVENT_ADMIN_THEME_LIST = 'admin_theme_list';

    public static function onAdminThemeList($callback)
    {
        static::on(static::EVENT_ADMIN_THEME_LIST, $callback);
    }

    public static function onAdminMainMenu($callback)
    {
        static::on(static::EVENT_ADMIN_MAIN_MENU, $callback);
    }

    public static function onAdminOptionsMenu($callback)
    {
        static::on(static::EVENT_ADMIN_OPTIONS_MENU, $callback);
    }

    public static function adminThemeList($return = [])
    {
        $event = new Event;

        $event->result = $return;

        static::trigger(static::EVENT_ADMIN_THEME_LIST, $event);

        return $event->result;
    }

    public static function mainMenu()
    {
        $mainMenu = new Event;

        $mainMenu->items = [];

        AdminEvents::trigger(static::EVENT_ADMIN_MAIN_MENU, $mainMenu);

        $view = service('renderer');

        $data = $view->getData();

        $return = $mainMenu->items;

        if (array_key_exists('mainMenu', $data))
        {
            $return = array_merge_recursive($return, $data['mainMenu']);
        }

        foreach($return as $key => $value)
        {
            if (empty($value['url']) || ($value['url'] == '#'))
            {
                if (empty($value['items']))
                {
                    unset($return[$key]);
                }
            }
        }

        return $return;
    }

    public static function optionsMenu()
    {
        $optionsMenu = new Event;

        $optionsMenu->items = [];

        AdminEvents::trigger(static::EVENT_ADMIN_OPTIONS_MENU, $optionsMenu);

        $view = service('renderer');

        $data = $view->getData();

        if (array_key_exists('optionsMenu', $data))
        {
            return array_merge_recursive($optionsMenu->items, $data['optionsMenu']);
        }

        return $optionsMenu->items;
    }

}