<?php
/**
 * @package Basic App Admin
 * @license MIT License
 * @link    http://basic-app.com
 */
namespace BasicApp\Admin\Controllers;

use BasicApp\Admin\Models\Admin\AdminModel;

abstract class BaseAdmin extends \BasicApp\Core\AdminCrudController
{

    protected static $roles = [AdminModel::ADMIN_ROLE];

	protected $modelClass = AdminModel::class;

	protected $viewPath = 'BasicApp\Admin\Admin';

	protected $returnUrl = 'admin/admin';

}