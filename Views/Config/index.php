<?php

use BasicApp\Helpers\Url;

$title = $modelClass::getFormName();

$this->data['title'] = $title;

$this->data['breadcrumbs'][] = ['label' => $title];

$this->data['adminOptionsMenu'][$modelClass]['active'] = true;

$this->data['enableCard'] = true;

$this->data['cardTitle'] = $title;

$adminTheme = service('adminTheme');

$form = $adminTheme->createForm([
    'model' => $row, 
    'errors' => $errors,
    'messages' => $messages
]);

echo $form->formOpenMultipart(Url::currentUrl());

echo $form->renderMessages();

echo $model->renderFields($form);

echo $form->renderErrors();

echo $form->submit(t('admin', 'Save'));

echo $form->formClose();