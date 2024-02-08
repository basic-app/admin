<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
namespace BasicApp\Admin\Controllers;

class Dashboard extends \BasicApp\Admin\AdminController
{

    protected $viewPath = 'BasicApp\Admin\Dashboard';

    protected $returnUrl = 'admin/dashboard';

    public function index()
    {
        return $this->render('index');
    }

}