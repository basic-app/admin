<?php

use BasicApp\Admin\AdminHooks;

BasicApp\Core\CoreEvents::onPreSystem([AdminHooks::class, 'preSystem']);
BasicApp\System\SystemEvents::onInstall([AdminHooks::class, 'install']);
BasicApp\Admin\AdminEvents::onAdminOptionsMenu([AdminHooks::class, 'adminOptionsMenu']);
BasicApp\Admin\AdminEvents::onAdminMainMenu([AdminHooks::class, 'adminMainMenu']);