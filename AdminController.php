<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Admin;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use BasicApp\Admins\Models\AdminModel;
use CodeIgniter\Security\Exceptions\SecurityException;
use CodeIgniter\Http\Exceptions\RedirectException;

class AdminController extends \BasicApp\Core\Controller
{

    protected $userService = 'adminAuth';

    protected $layoutPath = 'BasicApp\Admin';

    protected $layout = 'layout';

}