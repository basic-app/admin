<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Admin\Libraries;

use BasicApp\Auth\AuthService;
use BasicApp\Admin\AdminServiceInterface;
use BasicApp\Admin\AdminInterface;
use Exception;
use BasicApp\Admin\Models\AdminModel;
use BasicApp\Interfaces\AccessCheckerInterface;
use BasicApp\Admin\AdminEvents;
use BasicApp\Helpers\Url;

abstract class BaseAdminService extends AuthService
{

    protected $_user;

    protected $loginUrl = 'admin/login';

    protected $logoutUrl = 'admin/logout';

    public function can($permission) : bool
    {
        if (is_string($permission) && ($permission === 'guest'))
        {
            return true;
        }

        $user = $this->getUser();

        if (!$user)
        {
            return false;
        }

        if ($user->hasRole('admin'))
        {
            return true;
        }

        if (is_object($permission))
        {
            if ($permission instanceof AccessCheckerInterface)
            {
                return $permission->checkAccess($user);
            }

            return AdminEvents::checkAccess($user, $permission);
        }

        return false;
    }

    public function getUser()
    {
        if (!$this->_user)
        {
            $userId = $this->getId();

            if ($userId)
            {
                $adminModel = new AdminModel;

                $this->_user = $adminModel->find($userId);

                if (!$this->_user)
                {
                    $this->unsetId();
                }                
            }
        }

        return $this->_user;
    }

    public function login(AdminInterface $user, bool $rememberMe = true)
    {
        $id = $user->getPrimaryKey();

        if (!$id)
        {
            throw new Exception('Primary key not defined.');
        }

        $this->setId($id, $rememberMe);
    }

    public function logout()
    {
        $this->unsetId();
    }

    public function getLoginUrl()
    {
        return Url::createUrl($this->loginUrl);
    }

    public function getLogoutUrl()
    {
        return Url::createUrl($this->logoutUrl);
    }

}