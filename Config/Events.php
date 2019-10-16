<?php

use BasicApp\Admin\AdminEvents;
use BasicApp\System\SystemEvents;
use BasicApp\Helpers\Url;
use BasicApp\Configs\Controllers\Admin\Config as ConfigController;
use BasicApp\Admin\Forms\AdminConfigForm;
use BasicApp\Admin\AdminFilter;

AdminEvents::onAdminOptionsMenu(function($event) {

    if (ConfigController::checkAccess())
    {
        $event->items[AdminConfigForm::class] = [
            'label' => t('admin.menu', 'Admin'),
            'icon' => 'fa fa-users',
            'url' => Url::createUrl('admin/config', ['class' => AdminConfigForm::class])
        ];        
    }

});

SystemEvents::onFiltersConfig(function($event)
{

    $event->aliases['adminIsLoggedIn'] = AdminFilter::class;

    $event->filters['adminIsLoggedIn'] = [
        'before' => ['/admin/', '/admin/*']
    ];
    
});

SystemEvents::onPagerConfig(function($event) {

   $event->templates['adminTheme'] = 'BasicApp\Admin\pager';
   
});