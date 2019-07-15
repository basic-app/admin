<?php
/**
 * @package Basic App Admin
 * @license MIT License
 * @link    http://basic-app.com
 */
namespace BasicApp\Admin\Controllers;

use BasicApp\Admin\Models\AdminModel;
use BasicApp\Admin\Models\AdminLoginForm;
use BasicApp\Admin\Models\AdminLogin;
use Config\Services;

abstract class BaseLogin extends \BasicApp\Admin\AdminController
{

	protected $layout = 'login_layout';

	protected $viewPath = 'BasicApp\Admin';

	protected $layoutPath = 'BasicApp\Admin';

    public static function checkAccess(bool $throwExceptions = false)
    {
        return true;
    }

	public function index()
	{
		$admin = AdminModel::getCurrentUser();

		if ($admin)
		{
    		$url = site_url('admin');

    		return Services::response()->redirect($url);
		}

		$entity = new AdminLogin;

		$entity->remember_me = 1;

		$model = new AdminLoginForm;

		$post = $this->request->getPost();

		$errors = [];

		if ($post)
		{
			$entity->fill($post);

			$valid = $model->validate($entity);

			if ($valid)
			{
				$admin = $model::findAdminByLogin($entity->login);

				if ($admin)
				{
					if (AdminModel::checkPassword($entity->password, $admin->admin_password_hash))
					{
						AdminModel::login($admin, $entity->remember_me);

						$url = site_url('admin');

	    				return Services::response()->redirect($url);
					}
					else
					{
						// password not correct

						$errors['login'] = t('admin', 'Login or password is incorrect.');
					}
				}
				else
				{
					// admin not found

					$errors['login'] = t('admin', 'Login or password is incorrect.');
				}
			}
			else
			{
				$errors = $model->errors();
			}
		}

		$entity->password = '';

		return $this->render('login', [
			'model' => $entity,
			'errors' => $errors
		]);
	}

}