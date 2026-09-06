<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
namespace BasicApp\Admin\Controllers;

use CodeIgniter\Files\File;
use BasicApp\Admin\Settings\AdminSettings;
use App\Controllers\Admin\BaseController;

class AdminSettingsController extends BaseController
{
    protected function initialize()
    {
        helper(['form']);
    }

    public function index()
    {
        $data = new AdminSettings;

        if ($this->request->is('post'))
        {
            if ($this->validateData($this->request->getPost(), $data->rules()))
            {
                $data->fill(array_merge(
                    $this->validator->getValidated(), [
                        'avatar_image' => $this->request->getFile('avatar_image')
                    ]
                ));

                $data->save();

                $this->session->setFlashdata('success', lang('Admin.Data saved successfully.'));
                    
                return redirect()->to('admin/admin-settings');
            }
            else
            {
                $errors = $this->validator->getErrors();
            }
        }

        return view('BasicApp\Admin\admin-settings/index', [
            'data' => $data,
            'labels' => $data->labels(),
            'errors' => $errors ?? []
        ]);
    }
}