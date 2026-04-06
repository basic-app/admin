<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
namespace BasicApp\Admin\Controllers;

use BasicApp\Core\Controller;

class Logout extends Controller
{
	public function index()
	{
		if (user_id())
		{
            logout('admin');
		}

        return $this->redirect(site_url('admin'));
	}
}