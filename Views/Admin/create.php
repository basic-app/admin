<?php

require __DIR__ . '/_common.php';

$this->data['breadcrumbs'][] = ['label' => t('admin', 'Add User')];

echo form_open_multipart(classic_current_url(), ['method' => 'POST']);

echo PHPTheme::widget('card', [
	'header' => $this->data['title'],
	'content' => app_view('BasicApp\Admin\Admin\_form', [
		'model' => $model,
		'errors' => $errors
	])
]);

echo form_close();
