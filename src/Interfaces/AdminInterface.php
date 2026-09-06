<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 */
namespace BasicApp\Admin\Interfaces;

interface AdminInterface
{
    public function getAdminName() : ?string;

    public function getAdminEmail() : ?string;

    public function getAdminAvatarImageUrl(?string $default = null) : ?string;

    public function getAdminLogoutUrl() : ?string;

    public function getAdminAccountMenu() : array;
}