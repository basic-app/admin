<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
namespace BasicApp\Admin\Controllers;

use App\Controllers\Admin\BaseController;

class LoginController extends BaseController
{
    protected $helpers = ['auth'];

    protected $rules = [
        'login' => [
            'label' => 'Admin.Login',
            'rules' => 'required|max_length[255]|admin_login[1]'
        ],
        'password' => [
            'label' => 'Admin.Password',
            'rules' => 'required|max_length[255]|admin_password[admin_login]'
        ],
        'remember_me' => [
            'label' => 'Admin.Remember Me',
            'rules' => 'in_list[1]'
        ]
    ];

    public function index()
    {
        if ($this->request->is('post'))
        {
            if ($this->validateData($this->request->getPost(), $this->rules)) 
            {
                $validData = $this->validator->getValidated();

                login($validData['login'], (bool) $validData['remember_me'] ?? 0, 'admin');

                return redirect()->to(site_url('admin'));
            }
            else
            {
                $errors = $this->validator->getErrors();
            }
        }

        return view('BasicApp\Admin\login', [
            'errors' => $errors ?? [],
            'labels' => array_map(function($value){
                return lang($value['label']);
            }, $this->rules)
        ]);
    }
}
