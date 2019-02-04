<?php

echo PHPTheme::widget('tableRow', [
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
            'content' => PHPTheme::widget('tableButtonUpdate', [
                'url' => classic_url('admin/admin-role/update', ['id' => $model->role_id]),
                'label' => t('admin', 'Update')
            ])
        ],
        [
            'options' => ['style' => 'width: 1%; padding-left: 10px; padding-right: 20px'],
            'content' => PHPTheme::widget('tablebuttonDelete', [
                'url' => classic_url('admin/admin-role/delete', ['id' => $model->role_id]),
                'label' => t('admin', 'Delete')
            ])
        ]
    ]
]);