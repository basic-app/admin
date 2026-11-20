<?php

declare(strict_types=1);
/**
 * @author Basic App Dev Team
 * @license MIT
 */

namespace BasicApp\Admin\Settings;

use BasicApp\Settings\Settings;

class AdminSettings extends Settings
{
    public ?string $appName = null;

    public function rules(): array
    {
        return [
            'name' => [
                'label' => 'Admin.Site Name',
                'rules' => ['max_length[255]', 'required']
            ],
            'title' => [
                'label' => 'Admin.Site Title (META)',
                'rules' => ['max_length[255]', 'required']
            ],
            'keywords' => [
                'label' => 'Admin.Site Keywords (META)',
                'rules' => ['max_length[255]', 'permit_empty']
            ],
            'description' => [
                'label' => 'Admin.Site Description (META)',
                'rules' => ['max_length[255]', 'permit_empty']
            ],
            'copyright' => [
                'label' => 'Admin.Site Copyright',
                'rules' => ['max_length[255]', 'required']
            ]
        ];
    }
}
