<?php

$this->data['title'] = t('admin', 'Login');

echo admin_theme_widget('login', [
	'form' => [
		'buttons' => [
			'submit' => ['label' => t('admin', 'Sign in')]
		],
		'action' => site_url('admin/login'),
		'errors' => $errors,
		'fields' => [
			[
				'type' => 'text',
				'name' => 'login',
				'label' => $form->label('login'),
				'value' => $form->login
			],
			[
				'type' => 'password',
				'name' => 'password',
				'label' => $form->label('password'),
				'value' => ''
			],
			[
				'type' => 'checkbox',
				'name' => 'remember_me',
				'label' => $form->label('remember_me'),
				'value' => $form->remember_me
			]
		]
	]
]);