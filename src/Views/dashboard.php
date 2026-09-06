<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
$this->setVar('title', 'Title here...');
$this->setVar('description', 'Description here...');
$this->setVar('activeMenu', 'dashboard');
?>
<?php $this->extend('admin/layout');?>
<?php $this->section('content');?>

<?php $this->endSection();?>