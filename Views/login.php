<?php

$this->data['title'] = t('admin', 'Login');

echo PHPTheme::widget('login', [
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
				'label' => $form->fieldLabel('login'),
				'value' => $form->login
			],
			[
				'type' => 'password',
				'name' => 'password',
				'label' => $form->fieldLabel('password'),
				'value' => ''
			]/*,
			[
				'type' => 'checkbox',
				'name' => 'remember_me',
				'label' => $form->fieldLabel('remember_me'),
				'value' => $form->remember_me
			]*/
		]
	]
]);
