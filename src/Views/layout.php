<?php

declare(strict_types=1);

/**
 * @author Basic App Dev Team
 * @license MIT
 */

use CodeIgniter\Events\Events;
use BasicApp\Admin\Events\AdminMenu;
use BasicApp\Admin\Events\AdminFooterMenu;
use BasicApp\Admin\Events\AdminStyles;
use BasicApp\Admin\Events\AdminScripts;

helper([
    'render_view',
    'scripts',
    'styles'
]);

/** @var AdminStyles $adminStyles */
$adminStyles = AdminStyles::trigger();

/** @var AdminScripts $adminScripts */
$adminScripts = AdminScripts::trigger();

/** @var AdminMenu $adminMenu */
$adminMenu = AdminMenu::trigger();

/** @var AdminFooterMenu $adminFooterMenu */
$adminFooterMenu = AdminFooterMenu::trigger();

$adminMenuItems = [];

foreach($adminMenu->getItems() as $group => $items)
{
    $adminMenuItems[lang('Admin.' . $group)] = $items;
}

$content =  view_cell('AdminLayout', [
    'user' => service('adminAuth'),
    'appName' => service('adminSettings')->appName ?? 'Basic App',
    'lang' => service('request')->getLocale(),
    'title' => $title ?? null,
    'h1' => $h1 ?? null,
    'description' => $description ?? null,
    'breadcrumbs' => $breadcrumbs ?? [],
    'content' => $this->renderSection('content'),
    'styles' => '<!--render_styles()-->' // assets
        . implode("\n", $adminStyles->getItems()) // globals
        . $this->renderSection('pageStyles'), // page
    'scripts' => '<!--render_scripts()-->' // assets
        . implode("\n", $adminScripts->getItems()) // global
        . $this->renderSection('pageScripts'), // page
    'activeMenu' => $activeMenu ?? null,
    'actions' => $actions ?? [],
    'messages' => [
        'success' => service('session')->getFlashdata('success'),
        'danger' => service('session')->getFlashdata('error'),
        'info' => service('session')->getFlashdata('info')
    ],
    'menu' => $adminMenuItems,
    'footerMenu' => $adminFooterMenu->getItems(),
    'copyright' => '<a class="text-muted" href="https://basic-app.com/" target="_blank"><strong>Basic App</strong></a> &copy;'
]);

$content = str_replace('<!--render_styles()-->', render_styles(), $content);
$content = str_replace('<!--render_scripts()-->', render_scripts(), $content);

echo $content;