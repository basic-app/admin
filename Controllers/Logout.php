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
            user_id(0);
		}

        return $this->redirect(site_url('admin'));
	}
}