<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Admin\Libraries;

abstract class BaseAdminService extends \Denis303\Auth\AuthService
{

    public function findUserById($id)
    {
        $model = new $this->_modelClass;

        return $model::findByPk($id);
    }

    public function getLoginUrl()
    {
        return site_url('admin/login');
    }

    public function getLogoutUrl()
    {
        return site_url('admin/logout');
    }

}