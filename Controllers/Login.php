<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
namespace BasicApp\Admin\Controllers;

use BasicApp\Admin\Forms\AdminLoginForm;
use BasicApp\Admin\Forms\AdminLogin;
use BasicApp\Helpers\Url;
use Exception;

class Login extends \BasicApp\Admin\AdminController
{

	protected $layout = 'login_layout';

	protected $viewPath = 'BasicApp\Admin';

	protected $layoutPath = 'BasicApp\Admin';

	public function index()
	{
        $authService = service('adminAuth');

		if ($authService->user_id())
		{
            return $this->redirect($adminService->dashboardUrl());
		}

		$data = new AdminLogin;

		$data->remember_me = 1;

		$model = new AdminLoginForm;

		$post = $this->request->getPost();

		$errors = [];

		if ($post)
		{
			$data->fill($post);

			$valid = $model->validate($data);

			if ($valid)
			{
                $config = config('Admin');

                if ($config->login == $data->login)
                {
                    if (password_verify($data->password, $config->passwordHash))
                    {
                        $authService->login($data->login, $data->remember_me);
                    
                        return $this->redirect($authService->dashboardUrl());
                    }
                    else
                    {
                        $errors['password'] = t('admin', 'Login or password is incorrect.');
                    }
                }
                else
                {
                    $errors['password'] = t('admin', 'Login or password is incorrect.');
                }
			}
		}

		$data->password = '';

		return $this->render('login', [
            'model' => $model,
            'data' => $data,
            'errors' => array_merge((array) $model->errors(), $errors)
        ]);
	}

}