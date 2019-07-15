<?php
/**
 * @package Basic App Admin
 * @license MIT License
 * @link    http://basic-app.com
 */
namespace BasicApp\Admin;

use Config\Services;
use BasicApp\Admin\AdminEvents;
use stdClass;

abstract class BaseAdminService extends \BasicApp\Core\Service
{

    public function mainMenu()
    {
        $view = Services::renderer();

        $data = $view->getData();

        $mainMenu = new stdClass;

        $mainMenu->items = [];

        AdminEvents::trigger(AdminEvents::EVENT_ADMIN_MAIN_MENU, $mainMenu);

        $view = Services::renderer();

        $data = $view->getData();

        if (array_key_exists('mainMenu', $data))
        {
            return array_merge_recursive($mainMenu->items, $data['mainMenu']);
        }

        return $mainMenu->items;
    }

    public function optionsMenu()
    {
        $optionsMenu = new stdClass;

        $optionsMenu->items = [];

        AdminEvents::trigger(AdminEvents::EVENT_ADMIN_OPTIONS_MENU, $optionsMenu);

        $view = Services::renderer();

        $data = $view->getData();

        if (array_key_exists('optionsMenu', $data))
        {
            return array_merge_recursive($optionsMenu->items, $data['optionsMenu']);
        }

        return $optionsMenu->items;
    }

}