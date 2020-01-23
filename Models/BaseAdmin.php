<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Admin\Models;

use BasicApp\Admin\AdminInterface;

abstract class BaseAdmin extends \CodeIgniter\Entity implements AdminInterface
{

    public $attributes = [
        'name' => null,
        'avatar' => null,
        'email' => null,
        'roles' => []
    ];

    public function getPrimaryKey()
    {
        return $this->name;
    }

    public function getAvatarUrl($default = null)
    {
        if (!$this->avatar)
        {
            return $default;
        }

        return base_url($this->avatar);
    }

    public function hasRole($roles) : bool
    {
        if (is_array($this->roles))
        {
            $roles = (array) $roles;

            foreach($roles as $role)
            {
                if (array_search($role, $this->roles) !== false)
                {
                    return true;   
                }
            }
        }

        return false;
    }

    public function getRoles() : array
    {
        return $this->attributes['roles'];
    }

    public function getName()
    {
        return $this->attributes['name'];
    }

    public function getEmail()
    {
        return $this->attributes['email'];
    }

    public function getDescription()
    {
        return null;
    }


}