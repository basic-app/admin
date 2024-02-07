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
use CodeIgniter\Events\Events;

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

Events::on('pre_system', function()
{
    $pager = config(\Config\Pager::class);

    $pager->templates['adminTheme'] ='BasicApp\Admin\pager';

    $filters = config(\Config\Filters::class);

    $filters->aliases['adminIsLoggedIn'] = AdminFilter::class;

    $filters->filters['adminIsLoggedIn'] = [
        'before' => ['/admin/', '/admin/*']
    ];
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