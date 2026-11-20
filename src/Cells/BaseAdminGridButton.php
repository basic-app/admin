<?php

declare(strict_types=1);
/**
 * @author Basic App Dev Team
 * @license MIT
 */

namespace BasicApp\Admin\Cells;

use CodeIgniter\View\Cells\Cell;

abstract class BaseAdminGridButton extends Cell
{
    public const SCENARIO_ADD = 'add';
    public const SCENARIO_EDIT = 'edit';
    public const SCENARIO_DELETE = 'delete';

    public ?string $scenario = null;
    public ?string $type = null;
    public ?string $icon = null;
    public ?string $label = null;
    public ?string $confirmation = null;
    public ?string $method = null;

    public function mount(): void
    {
        switch ($this->scenario) {
            case static::SCENARIO_ADD:
                $this->type = $this->type ?? 'primary';
                $this->icon = $this->icon ?? 'fa-regular fa-plus';
                $this->label = $this->label ?? lang('Admin.Add');
                break;

            case static::SCENARIO_EDIT:
                $this->type = $this->type ?? 'primary';
                $this->icon = $this->icon ?? 'fa-regular fa-edit';
                $this->label = $this->label ?? lang('Admin.Edit');
                break;

            case static::SCENARIO_DELETE:
                $this->type = $this->type ?? 'danger';
                $this->icon = $this->icon ?? 'fa-trash';
                $this->label = $this->label ?? lang('Admin.Delete');
                $this->confirmation = $this->confirmation ?? lang('Admin.Are you sure?');
                $this->method = $this->method ?? 'POST';
                break;
        }
    }
}
