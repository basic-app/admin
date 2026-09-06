<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
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

$content = view_cell('AdminAuthLayout', [
    'lang' => service('request')->getLocale(),
    'title' => $title ?? null,
    'description' => $description ?? null,
    'content' => $this->renderSection('content'),
    'styles' => implode("\n", $adminStyles->styles),
    'scripts' => implode("\n", $adminScripts->scripts)
]);

$content = str_replace('<!--render_styles()-->', render_styles(), $content);
$content = str_replace('<!--render_scripts()-->', render_scripts(), $content);

echo $content;