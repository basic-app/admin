<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
use CodeIgniter\View\View;

if (!function_exists('register_admin_confirmation'))
{
    function register_admin_confirmation(array $params = [], ?View $renderer = null) : void
    {
        helper(['scripts', 'render_view']);

        add_script(render_view('BasicApp\Admin\confirmation', $params), true, $renderer);
    }
}