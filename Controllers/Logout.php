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
        $authService = service('adminAuth');

		if ($authService->user_id())
		{
            $authService->logout();
		}

        return $this->redirect($authService->dashboardUrl());
	}

}