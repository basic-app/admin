<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
if (!function_exists('admin_icon'))
{
    function admin_icon(array $params = [])
    {
        helper('render_view');

        render_view('BasicApp\Admin\icon', $params);
    }
}