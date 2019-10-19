<?php

use BasicApp\Helpers\Url;
use BasicApp\Admin\AdminEvents;

$adminService = service('admin');

$admin = $adminService->getUser();

if (!$admin)
{
	throw new Exception('Security check error.');
}

$adminTheme = service('adminTheme');

AdminEvents::registerAssets($adminTheme->head, $adminTheme->beginBody, $adminTheme->endBody);

$actionMenu = array_key_exists('actionMenu', $this->data) ? $this->data['actionMenu'] : [];

$request = service('request');

$returnUrl = $request->getGet('returnUrl');

if ($returnUrl)
{
	$actionMenu[] = [
		'url'       => Url::createUrl($returnUrl),
		'label'     => t('admin.menu', 'Back'),
		'icon'      => 'fa fa-arrow-left',
		'linkClass' => 'btn btn-secondary',
	];
}

echo $adminTheme->mainLayout([
    'optionsMenu' => [
        'items' => AdminEvents::optionsMenu()
    ],
    'mainMenu' => [
        'items' => AdminEvents::mainMenu()
    ],
    'title' => array_key_exists('title', $this->data) ? $this->data['title'] : '',
    'actionsMenu' => [
        'items' => $actionMenu
    ],
    'breadcrumbs' => [
        'items' => array_key_exists('breadcrumbs', $this->data) ? $this->data['breadcrumbs'] : []
    ],
    'content' => $content,
    'copyright' => 'Copyright © 2018 - {year} <a href="' . base_url() . '" target="_blank">My App</a>.' . ' All rights reserved.',
    'account' => [
        'name' => $admin->admin_name,
        'description' => $admin->admin_email ? $admin->admin_email : '&nbsp;',
        'avatarUrl' => $admin->getAvatarUrl(),
        'profileUrl' => '#profile',
        'logoutUrl' => Url::createUrl('admin/logout'),
        'logoutLabel' => t('admin', 'Logout')
    ]
]);
