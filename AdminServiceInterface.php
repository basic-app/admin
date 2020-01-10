<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Admin;

interface AdminServiceInterface extends \Denis303\Auth\AuthServiceInterface
{

    public function getLoginUrl();

    public function getLogoutUrl();

    public function logout();

    public function login(AdminModelInterface $user, bool $rememberMe = true);

}