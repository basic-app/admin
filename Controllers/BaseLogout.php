<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Admin\Controllers;

use Config\Services;
use BasicApp\Admins\Models\AdminModel;
use BasicApp\Helpers\Url;

abstract class BaseLogout extends \BasicApp\Core\Controller
{

    public static function checkAccess(bool $throwExceptions = false)
    {
        return true;
    }

	public function index()
	{
        $adminService = service('admin');

		$admin = $adminService->getUser();

		if ($admin)
		{
            $adminService->logout();
		}

        return $this->redirect(site_url('admin'));
	}

}