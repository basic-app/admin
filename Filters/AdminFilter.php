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
        helper(['url', 'auth']);

        $loginUrl = site_url('admin/login');

        $currentUrl = current_url();

        if ($currentUrl == $loginUrl)
        {
            return;
        }

        if (user_id())
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