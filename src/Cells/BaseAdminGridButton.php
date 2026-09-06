<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
namespace BasicApp\Admin\Cells;

use CodeIgniter\View\Cells\Cell;

abstract class BaseAdminGridButton extends Cell
{
    const SCENARIO_ADD = 'add';
    const SCENARIO_EDIT = 'edit';
    const SCENARIO_DELETE = 'delete';

    public $scenario;
    public $type;
    public $icon;
    public $label;
    public $confirmation;
    public $method;

    public function mount() : void
    {
        switch($this->scenario) 
        {
            case static::SCENARIO_ADD: 
                $this->type = $this->type ?? 'primary';
                $this->icon = $this->icon ?? ['icon' => 'fa-regular fa-plus'];
                $this->label = $this->label ?? lang('Admin.Add');
            break;

            case static::SCENARIO_EDIT:
                $this->type = $this->type ?? 'primary';
                $this->icon = $this->icon ?? ['icon' => 'fa-regular fa-edit'];
                $this->label = $this->label ?? lang('Admin.Edit');
            break;

            case static::SCENARIO_DELETE:
                $this->type = $this->type ?? 'danger';
                $this->icon = $this->icon ?? ['icon' => 'fa-trash'];
                $this->label = $this->label ?? lang('Admin.Delete');
                $this->confirmation = $this->confirmation ?? lang('Admin.Are you sure?');
                $this->method = $this->method ?? 'POST';
            break;
        }
    }
}