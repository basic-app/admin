<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Admin;

use CodeIgniter\Events\Events;
use BasicApp\Admins\Models\AdminModel;
use BasicApp\Core\Controller;

abstract class BaseAdminController extends Controller
{

    const ROLE_ADMIN = 'admin';

    protected static $authService = 'admin';

    protected static $roles = [self::ROLE_LOGGED];

    protected $layoutPath = 'BasicApp\Admin';

    protected $layout = 'layout';

    public function __construct()
    {
        parent::__construct();

        Events::trigger('admin_controller_constructor');
    }

}