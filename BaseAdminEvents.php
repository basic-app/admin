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

    const EVENT_ADMIN_MAIN_MENU = 'ba:admin_main_menu';

    const EVENT_ADMIN_OPTIONS_MENU = 'ba:admin_options_menu';

    const EVENT_ADMIN_THEMES = 'ba:admin_themes';

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
        $event = new Event;

        $event->result = $return;

        static::trigger(static::EVENT_ADMIN_THEMES, $event);

        return $event->result;
    }

    public static function adminMainMenu()
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

    public static function adminOptionsMenu()
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