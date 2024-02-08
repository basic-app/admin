<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
namespace BasicApp\Admin\Commands;

class HashAdminPassword extends \BasicApp\Core\Command
{

    protected $group = 'basic-app/admin';
    
    protected $name = 'hash-admin-password';
    
    protected $description = 'Hash admin password';

    public function run(array $params)
    {
        list($password) = $params;

        echo password_hash($password, PASSWORD_DEFAULT);
    }

}