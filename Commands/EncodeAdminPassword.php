<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\Admin\Commands;

use Exception;

class EncodeAdminPassword extends \BasicApp\Core\Command
{

    protected $group = 'Basic App';
    
    protected $name = 'ba:encode_admin_password';
    
    protected $description = 'Encode admin password.';

    public function run(array $params)
    {
        list($id, $password) = $params;

        $adminService = service('admin');

        $modelClass = $adminService->getModelClass();

        $user = $modelClass::findByLogin($id);

        if (!$user)
        {
            throw new Exception('User not found: #' . $id);
        }

        echo $modelClass::encodePassword($user, $password);
    }

}