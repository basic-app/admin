<?php

declare(strict_types=1);
/**
 * @author Basic App Dev Team
 * @license MIT
 */

namespace BasicApp\Admin\Events;

use BasicApp\Event\Event;

class AdminScripts extends Event
{
    public $scripts = [];
}
