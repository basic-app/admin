<?php

use BasicApp\Helpers\Url;

echo admin_theme_widget('tableRow', [
    'columns' => [
        [
            'content' => $model->role_id,
            'options' => [
                'class' => 'd-none d-sm-table-cell text-right',
                'style' => 'width: 1%'
            ]
        ],
        [
            'content' => $model->role_uid,
            'options' => [
                'class' => 'process'
            ]
        ],
        [
            'content' => $model->role_name,
            'options' => [
                'class' => 'd-none d-sm-table-cell' 
            ]
        ],
        [
            'options' => ['style' => 'width: 1%; padding-left: 10px;'],
            'content' => admin_theme_widget('tableButtonUpdate', [
                'url' => Url::createUrl('admin/admin-role/update', ['id' => $model->role_id]),
                'label' => t('admin', 'Update')
            ])
        ],
        [
            'options' => ['style' => 'width: 1%; padding-left: 10px; padding-right: 20px'],
            'content' => admin_theme_widget('tableButtonDelete', [
                'url' => Url::createUrl('admin/admin-role/delete', ['id' => $model->role_id]),
                'label' => t('admin', 'Delete')
            ])
        ]
    ]
]);