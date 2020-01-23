<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Admin\Controllers;

abstract class BaseDashboard extends \BasicApp\Admin\AdminController
{

    protected $viewPath = 'BasicApp\Admin\Dashboard';

    protected $returnUrl = 'admin/dashboard';

    public function index()
    {
        return $this->render('index');
    }

}