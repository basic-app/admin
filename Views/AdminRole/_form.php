<?php

echo admin_theme_widget('formFieldText', [
    'errors' => $errors, 
    'name' => 'role_name', 
    'value' => $model->role_name,
    'label' => $model->label('role_name')
]);

echo admin_theme_widget('formFieldText', [
    'errors' => $errors, 
    'name' => 'role_uid', 
    'value' => $model->role_uid,
    'label' => $model->label('role_uid')
]);

echo admin_theme_widget('formErrors', ['errors' => $errors]);

echo admin_theme_widget('formButton', [
    'type' => 'submit', 
    'label' => $model->role_id ? t('admin', 'Update') : t('admin', 'Insert')
]);
