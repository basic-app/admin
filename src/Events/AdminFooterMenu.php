<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
namespace BasicApp\Admin\Events;

use BasicApp\Core\Event;

class AdminFooterMenu extends Event
{
    public $items = [];

    public function addItems(array $items) 
    {
        $this->items = array_merge(
            $this->items ?? [],
            $items
        );
    }

    public function prependItems(array $items) 
    {
        $this->items = array_merge(
            $items,
            $this->items ?? []
        );
    }
}