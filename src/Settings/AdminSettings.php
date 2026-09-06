<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
namespace BasicApp\Admin\Settings;

use BasicApp\Core\SettingsEntity;
use BasicApp\Admin\Interfaces\AdminInterface;
use CodeIgniter\HTTP\Files\UploadedFile;

class AdminSettings extends SettingsEntity implements AdminInterface
{
    protected $attributes = [
        'login' => null,
        'password_hash' => null,
        'avatar_image_path' => null,
        'avatar_image_original_name' => null,
        'appName' => null
    ];

    public function rules() : array
    {
        return [
            'login' => [
                'label' => 'Admin.Login',
                'rules' => ['max_length[255]', 'required']
            ],
            'new_password' => [
                'label' => 'Admin.Password',
                'rules' => ['max_length[255]', 'permit_empty']
            ],
            'avatar_image' => [
                'label' => 'Admin.Avatar Image',
                'rules' => ['permit_empty', 'uploaded', 'is_image']
            ],
            'avatar_image_clear' => [
                'rules' => 'permit_empty'
            ]
        ];
    }

    public function fill(?array $data = null) : void
    {
        if (!empty($data['new_password']))
        {
            $data['password_hash'] = static::encodePassword($data['new_password']);
        }

        unset($data['new_password']);

        parent::fill($data);
    }

    public static function encodePassword(string $password) : string
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public static function validatePassword(string $password, string $hash) : bool
    {
        return password_verify($password, $hash);
    }

    public function getAdminName() : ?string
    {
        return $this->login;
    }

    public function getAdminEmail() : ?string
    {
        return null;
    }

    public function getAdminAvatarImageUrl(?string $default = null) : ?string
    {
        if ($this->avatar_image_path)
        {
            return base_url($this->avatar_image_path);
        }

        return $default ? base_url($default) : null;
    }

    public function getAdminLogoutUrl() : ?string
    {
        return site_url('admin/logout');
    }

    public function getAdminAccountMenu() : array
    {
        return [
            [
                'label' => lang('Admin.Settings'),
                'url' => site_url('admin/admin-settings'),
                'icon' => [
                    'icon' => 'fa-user'
                ]
            ]
        ];
    }

    public function setAvatarImage(UploadedFile $image)
    {
        if ($image->isValid())
        {
            $this->avatar_image_path = $this->upload($image, 'uploads/avatars');
            $this->avatar_image_original_name = $image->getClientName();
        }
    }

    public function setAvatarImageClear($value)
    {
        if ($value == 1)
        {
            $this->avatar_image_path = null;
            $this->avatar_image_original_name = null;
        }
    }

    public function save(?string $class = null) : bool
    {
        $return = parent::save($class);

        if ($return)
        {
            $this->unlinkChanged(['avatar_image_path']);
        }

        return $return;
    }

}