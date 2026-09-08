<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
if (!function_exists('admin_icon'))
{
    function admin_icon(array $attributes = [])
    {
        helper('render_view');

        return render_view('BasicApp\Admin\icon', ['attributes' => $attributes]);
    }
}