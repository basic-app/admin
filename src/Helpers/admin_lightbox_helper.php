<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
if (!function_exists('register_admin_lightbox'))
{
    function register_admin_lightbox(array $params = [])
    {
        helper('render_view');

        render_view('BasicApp\Admin\lightbox', $params);
    }
}