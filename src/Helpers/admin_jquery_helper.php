<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
if (!function_exists('register_admin_jquery'))
{
    function register_admin_jquery(array $params = [])
    {
        helper('render_view');

        render_view('BasicApp\Admin\jquery', $params);
    }
}