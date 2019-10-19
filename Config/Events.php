<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 * @link http://basic-app.com
 */
use BasicApp\Admin\AdminEvents;
use BasicApp\System\SystemEvents;
use BasicApp\Helpers\Url;
use BasicApp\Config\Controllers\Admin\Config as ConfigController;
use BasicApp\Admin\Forms\AdminConfigForm;
use BasicApp\System\Forms\SystemConfigForm;
use BasicApp\Admin\Components\AdminFilter;

AdminEvents::onOptionsMenu(function($event) {

    if (ConfigController::checkAccess())
    {
        $event->items[SystemConfigForm::class] = [
            'label' => t('admin.menu', 'System'),
            'icon' => 'fa fa-desktop',
            'url' => Url::createUrl('admin/config', ['class' => SystemConfigForm::class])
        ];

        $event->items[AdminConfigForm::class] = [
            'label' => t('admin.menu', 'Admin'),
            'icon' => 'fa fa-users',
            'url' => Url::createUrl('admin/config', ['class' => AdminConfigForm::class])
        ];        
    }

});

SystemEvents::onFilters(function($event)
{

    $event->config->aliases['adminIsLoggedIn'] = AdminFilter::class;

    $event->config->filters['adminIsLoggedIn'] = [
        'before' => ['/admin/', '/admin/*']
    ];
    
});

SystemEvents::onPager(function($event) {

   $event->config->templates['adminTheme'] = 'BasicApp\Admin\pager';
   
});

AdminEvents::onMainMenu(function($event) {

    $event->items['system']['url'] = '#';
    $event->items['system']['label'] = t('admin.menu', 'System');
    $event->items['system']['icon'] = 'fa fa-wrench';

});