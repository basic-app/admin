<?php

$title = $modelClass::getFormName();

$this->data['title'] = $title;

$this->data['breadcrumbs'][] = ['label' => $title];

$this->data['adminOptionsMenu'][$modelClass]['active'] = true;

echo admin_theme_widget('card', [
    'header' => $title,
    'content' => admin_theme_widget('form', [
        'options' => [
            'id' => 'admin-config-form',
            'enctype' => 'multipart/form-data'
        ],
        'url' => classic_current_url(),
        'fields' => $modelClass::getFormFields($model),
        'errors' => $errors,
        'messages' => $messages,
        'buttons' => [
            'submit' => [
                'label' => t('admin', 'Save')
            ]
        ]
    ])
]);