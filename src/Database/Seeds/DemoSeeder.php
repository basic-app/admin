<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
namespace BasicApp\Admin\Database\Seeds;

use BasicApp\Core\Seeder;
use BasicApp\Admin\Settings\AdminSettings;

class DemoSeeder extends Seeder
{
    public function run()
    {
        service('settings')->setMany([
            'AdminSettings.login' => 'admin',
            'AdminSettings.password_hash' => AdminSettings::encodePassword('admin')
        ]);
    }
}
