<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
use BasicApp\Helpers\Url;
use BasicApp\Admin\AdminEvents;

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
    'optionsMenu' => adminOptionsMenu($this->data['optionsMenu'] ?? []),
    'mainMenu' => adminMainMenu($this->data['mainMenu'] ?? []),
    'title' => array_key_exists('title', $this->data) ? $this->data['title'] : '',
    'actionMenu' => $actionMenu,
    'breadcrumbs' => array_key_exists('breadcrumbs', $this->data) ? $this->data['breadcrumbs'] : [],
    'content' => $content,
    'copyright' => 'Copyright © <a href="http://basic-app.com" target="_blank">Basic App</a> 2018 – ' . date('Y'), // Don't change it! According of the MIT license.
    'account' => [
        'name' => service('adminAuth')->user_id(),
        'email' => null,
        'description' => t('admin', 'Administrator'),
        'avatarUrl' => null,
        'profileUrl' => null,
        'logoutUrl' => service('adminAuth')->logoutUrl(),
        'logoutLabel' => t('admin', 'Logout')
    ],
    'successMessages' => (array) $session->getFlashdata('success'),
    'errorMessages' => (array) $session->getFlashdata('error'),
    'infoMessages' => (array) $session->getFlashdata('info')    
]);