<?php
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

$adminStyles = AdminStyles::trigger([
    'styles' => [
        '<!--render_styles()-->',
        render_view('BasicApp\Admin\styles'),
        $this->renderSection('styles')
    ]
]);

$adminScripts = AdminScripts::trigger([
    'scripts' => [
        '<!--render_scripts()-->',
        render_view('BasicApp\Admin\scripts'),
        $this->renderSection('scripts')
    ]
]);

$adminMenu = AdminMenu::trigger();

$adminFooterMenu = AdminFooterMenu::trigger();

$content =  view_cell('AdminLayout', [
    'user' => service('adminSettings'),
    'appName' => service('adminSettings')->appName ?? 'Basic App',
    'lang' => service('request')->getLocale(),
    'title' => $title ?? null,
    'h1' => $h1 ?? null,
    'description' => $description ?? null,
    'breadcrumbs' => $breadcrumbs ?? [],
    'content' => $this->renderSection('content'),
    'styles' => implode("\n", $adminStyles->styles),
    'scripts' => implode("\n", $adminScripts->scripts),
    'activeMenu' => $activeMenu ?? null,
    'actions' => $actions ?? [],
    'messages' => [
        'success' => service('session')->getFlashdata('success'),
        'danger' => service('session')->getFlashdata('error'),
        'info' => service('session')->getFlashdata('info')
    ],
    'menu' => $adminMenu->items,
    'footerMenu' => $adminFooterMenu->items,
    'copyright' => '<a class="text-muted" href="https://basic-app.com/" target="_blank"><strong>Basic App</strong></a> &copy;'
]);

$content = str_replace('<!--render_styles()-->', render_styles(), $content);
$content = str_replace('<!--render_scripts()-->', render_scripts(), $content);

echo $content;