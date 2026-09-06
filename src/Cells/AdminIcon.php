<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
namespace BasicApp\Admin\Cells;

use CodeIgniter\View\Cells\Cell;

class AdminIcon extends Cell
{
    const TYPE_FA = 'FaIcon';

    protected string $view = __DIR__ . '/../../cells/admin-icon.php';

    public $icon;

    public $type = self::TYPE_FA;
}