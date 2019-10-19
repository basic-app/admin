<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Admin;

use BasicApp\Core\Event;

abstract class BaseAdminEvents extends \CodeIgniter\Events\Events
{

    const EVENT_MAIN_MENU = 'ba:admin_main_menu';

    const EVENT_OPTIONS_MENU = 'ba:admin_options_menu';

    const EVENT_THEMES = 'ba:admin_themes';

    const EVENT_REGISTER_ASSETS = 'ba:admin_register_assets';

    public static function onThemes($callback)
    {
        static::on(static::EVENT_THEMES, $callback);
    }

    public static function onRegisterAssets($callback)
    {
        static::on(static::EVENT_REGISTER_ASSETS, $callback);
    }    

    public static function onMainMenu($callback)
    {
        static::on(static::EVENT_MAIN_MENU, $callback);
    }

    public static function onOptionsMenu($callback)
    {
        static::on(static::EVENT_OPTIONS_MENU, $callback);
    }

    public static function themes($return = [])
    {
        $event = new Event;

        $event->result = $return;

        static::trigger(static::EVENT_THEMES, $event);

        return $event->result;
    }

    public static function mainMenu()
    {
        $mainMenu = new Event;

        $mainMenu->items = [];

        static::trigger(static::EVENT_MAIN_MENU, $mainMenu);

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

        static::trigger(static::EVENT_OPTIONS_MENU, $optionsMenu);

        $view = service('renderer');

        $data = $view->getData();

        if (array_key_exists('optionsMenu', $data))
        {
            return array_merge_recursive($optionsMenu->items, $data['optionsMenu']);
        }

        return $optionsMenu->items;
    }

    public static function registerAssets(&$head, &$beginBody, &$endBody)
    {
        $event = new Event;

        $event->head = $head;

        $event->beginBody = $beginBody;

        $event->endBody = $endBody;

        static::trigger(static::EVENT_REGISTER_ASSETS, $event);

        $head = $event->head;

        $beginBody = $event->beginBody;

        $endBody = $event->endBody;
    }

}