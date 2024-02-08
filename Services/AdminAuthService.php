<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
namespace BasicApp\Admin\Services;

use BasicApp\Auth\AuthService;

class AdminAuthService extends AuthService
{

    public $dashboardUrl = 'admin';

    public $loginUrl = 'admin/login';

    public $logoutUrl = 'admin/logout';

    public $loginTrigger = 'admin:login';

    public $logoutTrigger = 'admin:logout';

    public function loginUrl()
    {
        return site_url($this->loginUrl);
    }

    public function logoutUrl()
    {
        return site_url($this->logoutUrl);
    }

    public function dashboardUrl()
    {
        return site_url($this->dashboardUrl);
    }

}