<?php

helper(['form', 'url']);

$this->extend('BasicApp\Admin\auth-layout');

$this->data['title'] = t('admin', 'Login');

$this->section('content');

echo form_open(site_url('admin/login'));

echo view_cell('Admin::formInputGroup', [
    'attributes' => [
        'autofocus' => true,
        'name' => 'login',
        'value' => set_value('login')
    ],
    'label' => $attributes['login'] ?? 'login',
    'error' => $errors['login'] ?? null
]);

echo view_cell('Admin::formPasswordGroup', [
    'attributes' => [
        'name' => 'password'
    ],
    'label' => $attributes['password'] ?? 'password',
    'error' => $errors['password'] ?? null
]);

echo view_cell('Admin::formCheckboxGroup', [
    'for' => 'remember-checkbox',
    'attributes' => [
        'id' => 'remember-checkbox',
        'name' => 'remember_me'
    ],
    'label' => $attributes['remember_me'] ?? 'remember_me',
    'error' => $errors['remember_me'] ?? null
]);


echo view_cell('Admin::formSubmit', [
    'attributes' => [
        'value' => lang('Sign in')
    ]
]);

echo form_close();

$this->endSection();