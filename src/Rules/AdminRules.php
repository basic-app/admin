<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
namespace BasicApp\Admin\Rules;

use BasicApp\Admin\Settings\AdminSettings;

class AdminRules
{
    public function admin_login(
        $value,
        string $param,
        array $data,
        &$error = null,
        &$field = null) : bool
    {
        if ($value != service('adminSettings')->login)
        {
            $error = lang('Admin.Invalid login.');

            return false;
        }

        return true;
    }

    public function admin_password(
        $value,
        string $param,
        array $data,
        &$error = null,
        &$field = null) : bool
    {
        if (!AdminSettings::validatePassword($value, service('adminSettings')->password_hash))
        {
            $error = lang('Admin.Invalid password.');

            $field = 'password';

            return false;
        }

        return true;
    }
}