<?php

use CodeIgniter\Events\Events;
use BasicApp\Admin\Models\AdminModel;

require __DIR__ . '/_common.php';

$this->data['actionMenu'][] = [
	'url' => classic_url('admin/admin/create', ['returnUrl' => 'admin/admin']), 
	'label' => t('admin.menu', 'Add Admin'), 
	'icon' => 'plus',
	'linkOptions' => [
		'class' => 'btn btn-success'
	]	
];

unset($this->data['breadcrumbs'][count($this->data['breadcrumbs']) - 1]['url']);

$rows = [];

foreach($elements as $model)
{
    $rows[] = app_view('BasicApp\Admin\Admin\_row', ['model' => $model]);
}

$event = new StdClass;

$event->columns = [
    ['content' => AdminModel::fieldLabel('admin_id'), 'preset' => 'id small'],
    ['content' => AdminModel::fieldLabel('admin_created_at'), 'preset' => 'date medium'],
    ['content' => AdminModel::fieldLabel('admin_name'), 'preset' => 'primary'],
    ['content' => AdminModel::fieldLabel('admin_email'), 'preset' => 'small']
];

Events::trigger('admin_admin_table_head', $event);

$event->columns[] = ['options' => ['colspan' => 2]];

echo PHPTheme::widget('table', [
    'head' => [
        'columns' => $event->columns
    ],
    'rows' => $rows
]);

if ($pager)
{
    echo $pager->links('default', 'bootstrap4');
}