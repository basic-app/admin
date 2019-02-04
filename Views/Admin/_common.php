<?php

$this->data['mainMenu']['admin']['active'] = true;

$this->data['title'] = t('admin', 'Admins');

$this->data['breadcrumbs'][] = ['label' => $this->data['title'], 'url' => site_url('/admin/admin')];
