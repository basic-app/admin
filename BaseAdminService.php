<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
namespace BasicApp\Admin;

abstract class BaseAdminService extends \denis303\codeigniter4\UserService
{

    const ID_SESSION = 'ba_admin';

    public function findUserById($id)
    {
        $model = new $this->_modelClass;

        return $model::findByPk($id);
    }

}