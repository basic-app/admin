<?php

use BasicApp\Admin\AdminHooks;

BasicApp\Admin\AdminEvents::onAdminOptionsMenu([AdminHooks::class, 'adminOptionsMenu']);