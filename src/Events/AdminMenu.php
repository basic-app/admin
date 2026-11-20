<?php

declare(strict_types=1);
/**
 * @author Basic App Dev Team
 * @license MIT
 */

namespace BasicApp\Admin\Events;

use BasicApp\Event\Event;

class AdminMenu extends Event
{
    public array $items = [];

    public function prependGroup($groupName)
    {
        if (!array_key_exists($groupName, $this->items)) {
            $this->items = array_merge(
                [$groupName => []],
                $this->items
            );
        }

        return $this;
    }

    public function addItems(string $groupName, array $items)
    {
        $this->items[$groupName] = array_merge(
            $this->items[$groupName] ?? [],
            $items
        );
    }

    public function prependItems(string $groupName, array $items)
    {
        $this->items[$groupName] = array_merge(
            $items,
            $this->items[$groupName] ?? []
        );
    }

    public function getItems(): array
    {
        return $this->items;
    }
}
