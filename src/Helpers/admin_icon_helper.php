<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
if (!function_exists('admin_icon'))
{
    function admin_icon($icon)
    {
        if (is_string($icon))
        {
            helper(['fontawesome7']);
        
            return fontawesome7_icon($icon);
        }

        return view_cell($icon['cell'], $icon['attributes']);
    }
}