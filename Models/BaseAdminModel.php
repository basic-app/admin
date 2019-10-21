<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Admin\Models;

use Exception;
use BasicApp\Admin\Config\Admin as AdminConfig;

abstract class BaseAdminModel extends \CodeIgniter\Model
{

    const ROLE_ADMIN = 'admin';

    protected $primaryKey = 'name';

    public static $_admins;

    public static function findByPk($id)
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
            if ($admin->name == $id)
            {
                return $admin;
            }
        }

        return null;    
    }

    public static function findByLogin($login)
    {
        return static::findByPk($login);
    }

    public static function encodePassword($data, $password)
    {
        return $password;
    }

    public static function checkPassword($data, $password)
    {
        return $password === $data->password;
    }

    public static function userHasRole($user, $role)
    {
        if (array_search($role, $user->roles) !== false)
        {
            return true;
        }

        return false;
    }

}