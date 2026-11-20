<?php

declare(strict_types=1);

/**
 * @author Basic App Dev Team
 * @license MIT
 * 
 * @var CodeIgniter\Pager\PagerRenderer $pager
 */

echo view_cell('AdminPager', [
    'pager' => $pager
]);