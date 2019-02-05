<?php

use BasicApp\Admin\Models\Admin\AdminRoleModel;

echo PHPTheme::widget('formFieldText', [
	'name' => 'admin_name',
	'value' => $model->admin_name,
	'label' => $model->fieldLabel('admin_name'),
	'error' => array_key_exists('admin_name', $errors) ? $errors['admin_name'] : null
]);

echo PHPTheme::widget('formFieldText', [
	'name' => 'admin_email',
	'value' => $model->admin_email,
	'label' => $model->fieldLabel('admin_email'),
	'error' => array_key_exists('admin_email', $errors) ? $errors['admin_email'] : null
]);

echo PHPTheme::widget('formFieldText', [
	'type' => 'password',
	'name' => 'admin_new_password',
	'value' => $model->admin_new_password,
	'label' => $model->fieldLabel('admin_new_password'),
	'error' => array_key_exists('admin_new_password', $errors) ? $errors['admin_new_password'] : null
]);

echo PHPTheme::widget('formFieldSelect', [
    'name' => 'admin_role_id',
    'value' => $model->admin_role_id,
    'label' => $model->fieldLabel('admin_role_id'),
    'error' => array_key_exists('admin_role_id', $errors) ? $errors['admin_role_id'] : null,
    'items' => AdminRoleModel::getListItems(),
    'prompt' => '...'
]);

echo PHPTheme::widget('formFieldImage', [
	'name' => 'admin_avatar_file',
	'url' => $model->avatarUrl(),
	'label' => $model->fieldLabel('admin_avatar_file'),
	'error' => array_key_exists('admin_avatar_file', $errors) ? $errors['admin_avatar_file'] : null
]);

echo PHPTheme::widget('formErrors', ['errors' => $errors]);

echo PHPTheme::widget('formButton', ['type' => 'submit', 'label' => $model->admin_id ? t('admin', 'Update') : t('admin', 'Insert')]);