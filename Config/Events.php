<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
use BasicApp\Admin\AdminEvents;
use BasicApp\System\SystemEvents;
use BasicApp\Helpers\Url;
use BasicApp\Config\Controllers\Admin\Config as ConfigController;
use BasicApp\Admin\Forms\AdminConfigForm;
use BasicApp\System\Forms\SystemConfigForm;
use BasicApp\Admin\Filters\AdminFilter;

AdminEvents::onOptionsMenu(function($event)
{
    if (service('admin')->can(ConfigController::class))
    {
        $event->items[AdminConfigForm::class] = [
            'label' => t('admin.menu', 'Admin'),
            'icon' => 'fa fa-fw fa-id-card',
            'url' => Url::createUrl('admin/config', ['class' => AdminConfigForm::class])
        ];        
    }
});

SystemEvents::onFilters(function($event)
{
    $event->aliases['adminIsLoggedIn'] = AdminFilter::class;

    $event->filters['adminIsLoggedIn'] = [
        'before' => ['/admin/', '/admin/*']
    ];   
});

SystemEvents::onPager(function($event)
{
   $event->templates['adminTheme'] = 'BasicApp\Admin\pager';  
});

AdminEvents::onMainMenu(function($event)
{
    $event->items['site']['url'] = '#';
    $event->items['site']['label'] = t('admin.menu', 'Site');
    $event->items['site']['icon'] = 'fa fa-bars';

    $event->items['system']['url'] = '#';
    $event->items['system']['label'] = t('admin.menu', 'System');
    $event->items['system']['icon'] = 'fa fa-wrench';
});