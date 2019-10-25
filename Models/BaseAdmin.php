<?php
/**
 * @author Basic App Dev Team
 * @link http://basic-app.com
 * @license MIT
 */
namespace BasicApp\Admin\Models;

abstract class BaseAdmin extends \CodeIgniter\Entity
{

    public function getAvatarUrl($default = null)
    {
        if (!$this->avatar)
        {
            return $default;
        }

        return base_url($this->avatar);
    }

}