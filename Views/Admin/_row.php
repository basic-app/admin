<?php

use CodeIgniter\Events\Events;

$event = new StdClass;

$event->columns = [
    ['content' => $model->admin_id, 'preset' => 'id small'],
    ['content' => $model->admin_created_at, 'preset' => 'date medium'],
    ['content' => $model->admin_name, 'preset' => 'primary'],
    ['content' => $model->admin_email, 'preset' => 'small']
];

Events::trigger('admin_admin_table_row', $event);

$event->columns[] = [
    'content' => PHPTheme::widget('tableButtonUpdate', [
        'url' => classic_url('admin/admin/update', [
            'id' => $model->getPrimaryKey(), 
            'returnUrl' => classic_uri_string()
        ])
    ]), 
    'preset' => 'button'
];

$event->columns[] = [
    'content' => PHPTheme::widget('tableButtonDelete', [
        'url' => classic_url('admin/admin/delete', [
            'id' => $model->getPrimaryKey(), 
            'returnUrl' => classic_uri_string()
        ])
    ]), 
    'preset' => 'button'
];

echo PHPTheme::widget('tableRow', ['columns' => $event->columns]);