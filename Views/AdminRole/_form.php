<?php

echo PHPTheme::widget('formFieldText', [
    'errors' => $errors, 
    'name' => 'role_name', 
    'value' => $model->role_name,
    'label' => $model->fieldLabel('role_name')
]);

echo PHPTheme::widget('formFieldText', [
    'errors' => $errors, 
    'name' => 'role_uid', 
    'value' => $model->role_uid,
    'label' => $model->fieldLabel('role_uid')
]);

echo PHPTheme::widget('formErrors', ['errors' => $errors]);

echo PHPTheme::widget('formButton', [
    'type' => 'submit', 
    'label' => $model->role_id ? t('admin', 'Update') : t('admin', 'Insert')
]);
