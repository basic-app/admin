<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
if (!function_exists('register_admin_editor'))
{
    function register_admin_editor(array $params = [])
    {
        helper('render_view');

        render_view('BasicApp\Admin\editor', $params);
    }
}