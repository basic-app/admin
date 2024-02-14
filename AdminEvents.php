<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
namespace BasicApp\Admin;

use BasicApp\Admin\Events\AdminThemesEvent;
use BasicApp\Admin\Events\AdminRegisterAssetsEvent;

class AdminEvents extends \CodeIgniter\Events\Events
{

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

    public static function themes($return = [])
    {
        $event = new AdminThemesEvent;

        $event->result = $return;

        static::trigger(static::EVENT_THEMES, $event);

        return $event->result;
    }

    public static function registerAssets(&$head, &$beginBody, &$endBody)
    {
        $event = new AdminRegisterAssetsEvent;

        $event->head = $head;

        $event->beginBody = $beginBody;

        $event->endBody = $endBody;

        static::trigger(static::EVENT_REGISTER_ASSETS, $event);

        $head = $event->head;

        $beginBody = $event->beginBody;

        $endBody = $event->endBody;
    }

}