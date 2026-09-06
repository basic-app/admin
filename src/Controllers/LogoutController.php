<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
namespace BasicApp\Admin\Controllers;

use App\Controllers\Admin\BaseController;

class LogoutController extends BaseController
{
    protected $helpers = ['auth'];
    
    public function index()
    {
        logout('admin');

        return redirect()->to(site_url('admin'));
    }
}
