<?php

require __DIR__ . '/_common.php';

$this->data['breadcrumbs'][] = ['label' => t('admin', 'Add Role')];

echo form_open_multipart('', ['method' => 'POST']);

echo admin_theme_widget('card', [
	'header' => $this->data['title'],
	'content' => app_view('BasicApp\Admin\AdminRole\_form', [
		'model' => $model,
		'errors' => $errors
	])
]);

echo form_close();