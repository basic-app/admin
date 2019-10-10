<?php

use BasicApp\Helpers\Url;

$this->data['title'] = t('admin', 'Login');

$adminTheme = service('adminTheme');

$form = $adminTheme->createForm($model, $errors);

echo $form->open(Url::createUrl('admin/login'));

echo $form->inputGroup($data, 'login');

echo $form->passwordGroup($data, 'password');

echo $form->checkboxGroup($data, 'remember_me');

echo $form->renderErrors();

echo $form->submit($data, 'submit', t('admin', 'Sign in'));

echo $form->close();