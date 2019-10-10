<?php
/**
 * @copyright Copyright (c) 2018-2019 Basic App Dev Team
 * @link http://basic-app.com
 * @license MIT License
 */
namespace BasicApp\Admin;

use CodeIgniter\Events\Events;
use BasicApp\Admins\Models\AdminModel;
use BasicApp\Core\Controller;

abstract class BaseAdminController extends Controller
{

    const ROLE_ADMIN = 'admin';

    protected static $authService = 'admin';

    protected static $roles = [self::ROLE_LOGGED];

    protected $layoutPath = 'admin';

	protected $layout = 'layout';

	public function __construct()
	{
		parent::__construct();

		Events::trigger('admin_controller_constructor');
	}

}