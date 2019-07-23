<?php

use BasicApp\Admin\AdminHooks;

BasicApp\System\SystemEvents::onInstall([AdminHooks::class, 'install']);
BasicApp\Admin\AdminEvents::onAdminOptionsMenu([AdminHooks::class, 'adminOptionsMenu']);