<?php

use CodeIgniter\Events\Events;
use BasicApp\Admin\Models\AdminRoleModel;
use BasicApp\Helpers\Url;

require __DIR__ . '/_common.php';

$this->data['actionMenu'][] = [
	'url' => Url::returnUrl('admin/admin-role/create'), 
	'label' => t('admin.menu', 'Add Role'), 
	'icon' => 'fa fa-plus',
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

echo admin_theme_widget('table', [
    'head' => [
        'columns' => [
            ['content' => '#', 'options' => ['class' => 'd-none d-sm-table-cell']],
            ['content' => AdminRoleModel::label('role_uid')],
            ['content' => AdminRoleModel::label('role_name'), ['options' => ['class' => 'd-none d-sm-table-cell']]],
            ['options' => ['colspan' => 2]]
        ]
    ],
    'rows' => $rows
]);

if ($pager)
{
    echo $pager->links('default', 'bootstrap4');
}