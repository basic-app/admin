<?php

use BasicApp\Admin\AdminHooks;
use BasicApp\Core\CoreEvents;
use BasicApp\Admin\AdminEvents;
use BasicApp\System\SystemEvents;

CoreEvents::onPreSystem([AdminHooks::class, 'preSystem']);
SystemEvents::onInstall([AdminHooks::class, 'install']);
AdminEvents::onAdminOptionsMenu([AdminHooks::class, 'adminOptionsMenu']);
AdminEvents::onAdminMainMenu([AdminHooks::class, 'adminMainMenu']);