<?php
/**
 * @package Basic App Admin
 * @license MIT License
 * @link    http://basic-app.com
 */
namespace BasicApp\Admin\Controllers;

use BasicApp\Admin\Models\Admin\AdminModel;

abstract class BaseDashboard extends \BasicApp\Core\AdminController
{

    protected static $roles = [AdminModel::ADMIN_ROLE];

    protected $viewPath = 'BasicApp\Admin\Dashboard';

    protected $returnUrl = 'admin/dashboard';

    public function index()
    {
        return $this->render('index');
    }

}