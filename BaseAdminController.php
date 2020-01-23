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
use BasicApp\Core\Controller;
use CodeIgniter\Security\Exceptions\SecurityException;

abstract class BaseAdminController extends Controller
{

    protected $userService = 'admin';

    protected $checkAccess = true;

    protected $layoutPath = 'BasicApp\Admin';

    protected $layout = 'layout';

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);

        if ($this->checkAccess)
        {
            if (!service($this->userService)->can(static::class))
            {
                throw SecurityException::forDisallowedAction();
            }
        }
    }

}