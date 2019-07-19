<?php
/**
 * @package Basic App Admin
 * @license MIT License
 * @link    http://basic-app.com
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
		$admin = AdminModel::getCurrentUser();

		if ($admin)
		{
			AdminModel::logout();
		}

		$url = site_url('admin');

        return services('response')->redirect($url);
	}

}