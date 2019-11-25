<?php

use BasicApp\Helpers\Url;

$this->data['title'] = t('admin', 'Login');

$adminTheme = service('adminTheme');

$form = $adminTheme->createForm($model, $errors);

echo $form->open('', ['autocomplete' => '!off']);

echo $form->inputGroup($data, 'login', ['autofocus' => true]);

echo $form->passwordGroup($data, 'password');

echo $form->checkboxGroup($data, 'remember_me');

echo $form->renderErrors();

$label = t('admin', 'Sign in');

echo $form->beginButtons();

echo $form->submitButton($label);

echo $form->endButtons();

echo $form->close();