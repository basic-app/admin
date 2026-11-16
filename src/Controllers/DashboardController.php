<?php
declare(strict_types=1);
/**
 * @author Basic App Dev Team
 * @license MIT
 */
namespace BasicApp\Admin\Controllers;

class DashboardController extends BaseController
{
    public function index(): string
    {
        return view('BasicApp\Admin\dashboard');
    }
}
