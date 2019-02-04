<?php

use CodeIgniter\Events\Events;
use BasicApp\Admin\Models\AdminRoleModel;

require __DIR__ . '/_common.php';

$this->data['actionMenu'][] = [
	'url' => classic_url('admin/admin-role/create', ['returnUrl' => 'admin/admin-role']), 
	'label' => t('admin.menu', 'Add Role'), 
	'icon' => 'plus',
	'linkOptions' => [
		'class' => 'btn btn-success'
	]	
];

unset($this->data['breadcrumbs'][count($this->data['breadcrumbs']) - 1]['url']);

$rows = [];

foreach($elements as $model)
{
    $rows[] = app_view('BasicApp\Admin\AdminRole\_row', ['model' => $model]);
}

echo PHPTheme::widget('table', [
    'head' => [
        'columns' => [
            ['content' => '#', 'options' => ['class' => 'd-none d-sm-table-cell']],
            ['content' => AdminRoleModel::fieldLabel('role_uid')],
            ['content' => AdminRoleModel::fieldLabel('role_name'), ['options' => ['class' => 'd-none d-sm-table-cell']]],
            ['options' => ['colspan' => 2]]
        ]
    ],
    'rows' => $rows
]);

if ($pager)
{
    echo $pager->links('default', 'bootstrap4');
}