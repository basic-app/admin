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
use CodeIgniter\Router\Exceptions\RedirectException;

abstract class BaseAdminController extends \BasicApp\Core\Controller
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
            $this->checkAccess();
        }
    }

    protected function checkAccess()
    {
        $userService = service($this->userService);

        if (!$userService->can(static::class))
        {
            if ($userService->getUser())
            {
                throw SecurityException::forDisallowedAction();
            }
            else
            {
                $url = $userService->getLoginUrl();

                throw new RedirectException($url);
            }
        }             
    }

}