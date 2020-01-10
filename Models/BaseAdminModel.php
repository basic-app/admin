<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Admin\Models;

use Exception;
use BasicApp\Admin\Config\Admin as AdminConfig;
use BasicApp\Admin\AdminModelInterface;

abstract class BaseAdminModel extends \CodeIgniter\Model implements AdminModelInterface
{

    const ROLE_ADMIN = 'admin';

    protected $primaryKey = 'name';

    public static $_admins;

    public function findByField($field, $value)
    {
        if (static::$_admins === null)
        {
            static::$_admins = [];

            $config = config(AdminConfig::class);

            if (!$config->admins)
            {
                throw new Exception('No admins found.');
            }

            foreach($config->admins as $row)
            {
                static::$_admins[] = new Admin($row);
            }
        }

        foreach(static::$_admins as $admin)
        {
            if ($admin->{$field} == $value)
            {
                return $admin;
            }
        }

        return null;        
    }

    public function find($id = null)
    {
        return $this->findByField($this->primaryKey, $id);
    }

    public function findByLogin($login)
    {
        return $this->findByField($this->primaryKey, $login);
    }

    public function encodePassword($data, $password)
    {
        return $password;
    }

    public function checkPassword($data, $password)
    {
        return $password === $data->password;
    }

}