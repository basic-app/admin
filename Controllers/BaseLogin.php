<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Admin\Controllers;

use BasicApp\Admin\Models\AdminModel;
use BasicApp\Admin\Forms\AdminLoginForm;
use BasicApp\Admin\Forms\AdminLogin;
use BasicApp\Helpers\Url;
use Exception;

abstract class BaseLogin extends \BasicApp\Admin\AdminController
{

	protected $layout = 'login_layout';

	protected $viewPath = 'BasicApp\Admin';

	protected $layoutPath = 'BasicApp\Admin';

    protected $adminModel;

    public function __construct()
    {
        parent::__construct();

        $this->adminModel = new AdminModel;
    }

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
    		$url = Url::createUrl('admin');

            return service('response')->redirect($url);
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
                $user = $this->adminModel->findByLogin($data->login);

				if ($user)
				{
					if ($this->adminModel->checkPassword($user, $data->password))
					{
                        $adminService->login($user, $data->remember_me);

						$url = Url::createUrl('admin');

                        return $this->redirect($url);
					}
					else
					{
						$errors['login'] = t('admin', 'Login or password is incorrect.');
					}
				}
				else
				{
					$errors['login'] = t('admin', 'User not found.');
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