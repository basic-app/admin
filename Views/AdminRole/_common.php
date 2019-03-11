<?php

$this->data['mainMenu']['system']['items']['admin-role']['active'] = true;

$this->data['title'] = t('admin', 'Admin Roles');

$this->data['breadcrumbs'][] = ['label' => $this->data['title'], 'url' => site_url('/admin/admin-role')];
