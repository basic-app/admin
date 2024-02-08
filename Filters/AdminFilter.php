<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
namespace BasicApp\Admin\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AdminFilter implements FilterInterface
{

    public function before(RequestInterface $request, $arguments = null)
    {
        $adminAuth = service('adminAuth');

        $loginUrl = $adminAuth->loginUrl();

        $currentUrl = current_url();

        if ($currentUrl == $loginUrl)
        {
            return;
        }

        if ($adminAuth->user_id())
        {
            return;
        }
    
        return redirect()->to($loginUrl);
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }

}