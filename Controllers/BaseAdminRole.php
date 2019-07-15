<?php
/**
 * @package Basic App Admin
 * @license MIT License
 * @link    http://basic-app.com
 */
namespace BasicApp\Admin\Controllers;

use BasicApp\Admin\Models\Admin\AdminRoleModel;
use BasicApp\Admin\Models\AdminModel;

abstract class BaseAdminRole extends \BasicApp\Admin\AdminCrudController
{

    protected static $roles = [AdminModel::ADMIN_ROLE];

	protected $modelClass = AdminRoleModel::class;

	protected $viewPath = 'BasicApp\Admin\AdminRole';

	protected $returnUrl = 'admin/admin-role';

}