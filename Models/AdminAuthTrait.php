<?php

namespace BasicApp\Admin\Models;

use Config\Services;
use Config\App;

trait AdminAuthTrait
{

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

        $admin_id = $session->get('admin_id');

        if ($admin_id)
        {
            $token = $session->get('admin_remember_token');

            if ($token)
            {
                helper('cookie');

                $cookie = get_cookie('admin_remember_token');

                if ($cookie != $token)
                {
                    static::logout();

                    return null;
                }
            }
        }

        return $admin_id;
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

    public static function login($user, $rememberMe = true)
    {
        $session = Services::session();

        $session->set('admin_id', $user->admin_id);

        if (!$rememberMe)
        {
            $token = md5(time() . $session->session_id);

            $session->set('admin_remember_token', $token);

            helper('cookie');

            $appConfig = new App();

            set_cookie(
                'admin_remember_token',
                $token,
                0,
                $appConfig->cookieDomain,
                $appConfig->cookiePath,
                $appConfig->cookiePrefix,
                false, // only send over HTTPS
                true // hide from Javascript
            );
        }
    }

    public static function logout()
    {
        $session = Services::session();

        $session->remove('admin_id');

        $session->remove('admin_remember_token');
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