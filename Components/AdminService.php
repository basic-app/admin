<?php

namespace BasicApp\Admin\Components;

use Config\Services;
use BasicApp\Core\Events;
use stdClass;

class AdminService extends \BasicApp\Core\Service
{

    public function mainMenu()
    {
        $view = Services::renderer();

        $data = $view->getData();

        $mainMenu = new stdClass;

        $mainMenu->items = [];

        Events::trigger('admin_main_menu', $mainMenu);

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

        Events::trigger('admin_options_menu', $optionsMenu);

        $view = Services::renderer();

        $data = $view->getData();

        if (array_key_exists('optionsMenu', $data))
        {
            return array_merge_recursive($optionsMenu->items, $data['optionsMenu']);
        }

        return $optionsMenu->items;
    }

}