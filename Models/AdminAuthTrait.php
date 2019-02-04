<?php

namespace BasicApp\Admin\Models;

use Config\Services;
use Config\App;

trait AdminAuthTrait
{

    protected static function getAuthSessionKey()
    {
        return 'admin_id';
    }

    public static function getLoginUrl()
    {
        return 'admin/login';
    }

    public static function getLogoutUrl()
    {
        return 'admin/logout';
    }

    public static function getCurrentUserId()
    {
        $session = Services::session();

        return $session->get(static::getAuthSessionKey());
    }

    public static function getCurrentUser()
    {
        $adminId = static::getCurrentUserId();

        if ($adminId)
        {
            $admin = static::factory()->find($adminId);

            if ($admin)
            {
                return $admin;
            }

            static::logout();
        }

        return null;
    }

    public static function login($user, $expire = null)
    {
        $session = Services::session();

        $session->set(static::getAuthSessionKey(), $user->admin_id);
    }

    public static function logout()
    {
        $session = Services::session();

        $session->remove(static::getAuthSessionKey());
    }

    public static function encodePassword(string $password)
    {
        $salt = (new App)->salt;

        $password .= $salt;

        return password_hash($password, PASSWORD_BCRYPT);
    }

    public static function checkPassword(string $password, string $passwordHash)
    {
        $salt = (new App)->salt;

        $password .= $salt;

        return password_verify($password, $passwordHash);
    }

    public static function userHasPermission($user, string $permission)
    {
        return static::userHasRole($user, $permission);
    }

}