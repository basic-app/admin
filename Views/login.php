<?php

use BasicApp\Helpers\Url;

$this->data['title'] = t('admin', 'Login');

$adminTheme = service('adminTheme');

$form = $adminTheme->createForm([
    'errors' => $errors,
    'model' => $model
]);

$url = Url::createUrl('admin/login');

echo $form->formOpen($url);

echo $form->input('login');

echo $form->password('password');

echo $form->checkbox('remember_me');

$submit = t('admin', 'Sign in');

echo $form->renderErrors();

echo $form->submit($submit);

echo $form->formClose();