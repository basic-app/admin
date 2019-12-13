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

$session = service('session');

echo $adminTheme->mainLayout([
    'homeUrl' => Url::createUrl('admin'),
    'optionsMenu' => AdminEvents::optionsMenu(),
    'mainMenu' => AdminEvents::mainMenu(),
    'title' => array_key_exists('title', $this->data) ? $this->data['title'] : '',
    'actionMenu' => $actionMenu,
    'breadcrumbs' => array_key_exists('breadcrumbs', $this->data) ? $this->data['breadcrumbs'] : [],
    'content' => $content,
    'copyright' => 'Copyright © <a href="http://basic-app.com" target="_blank">Basic App</a> 2018 – ' . date('Y'), // Don't change it! According of the MIT license.
    'account' => [
        'name' => $admin->getUserName(),
        'description' => $admin->getUserEmail() ? $admin->getUserEmail() : '&nbsp;',
        'avatarUrl' => $admin->getUserAvatarUrl(),
        'profileUrl' => '#profile',
        'logoutUrl' => Url::createUrl('admin/logout'),
        'logoutLabel' => t('admin', 'Logout')
    ],
    'successMessages' => (array) $session->getFlashdata('success'),
    'errorMessages' => (array) $session->getFlashdata('error'),
    'infoMessages' => (array) $session->getFlashdata('info')    
]);