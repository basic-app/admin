<?php

use BasicApp\Admin\Models\Admin\AdminRoleModel;

echo admin_theme_widget('formFieldText', [
	'name' => 'admin_name',
	'value' => $model->admin_name,
	'label' => $model->label('admin_name'),
	'error' => array_key_exists('admin_name', $errors) ? $errors['admin_name'] : null
]);

echo admin_theme_widget('formFieldText', [
	'name' => 'admin_email',
	'value' => $model->admin_email,
	'label' => $model->label('admin_email'),
	'error' => array_key_exists('admin_email', $errors) ? $errors['admin_email'] : null
]);

echo admin_theme_widget('formFieldText', [
	'type' => 'password',
	'name' => 'admin_new_password',
	'value' => $model->admin_new_password,
	'label' => $model->label('admin_new_password'),
	'error' => array_key_exists('admin_new_password', $errors) ? $errors['admin_new_password'] : null
]);

echo admin_theme_widget('formFieldSelect', [
    'name' => 'admin_role_id',
    'value' => $model->admin_role_id,
    'label' => $model->label('admin_role_id'),
    'error' => array_key_exists('admin_role_id', $errors) ? $errors['admin_role_id'] : null,
    'items' => AdminRoleModel::getListItems(),
    'prompt' => '...'
]);

echo admin_theme_widget('formFieldImage', [
	'name' => 'admin_avatar_file',
	'url' => $model->avatarUrl(),
	'label' => $model->label('admin_avatar_file'),
	'error' => array_key_exists('admin_avatar_file', $errors) ? $errors['admin_avatar_file'] : null
]);

echo admin_theme_widget('formErrors', ['errors' => $errors]);

echo admin_theme_widget('formButton', ['type' => 'submit', 'label' => $model->admin_id ? t('admin', 'Update') : t('admin', 'Insert')]);