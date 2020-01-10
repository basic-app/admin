<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Admin;

use Denis303\Auth\UserServiceInterface;

interface AdminServiceInterface extends UserServiceInterface
{

    public function getUser();

    public function getLoginUrl();

    public function getLogoutUrl();

    public function logout();

    public function login(AdminInterface $user, bool $rememberMe = true);

}