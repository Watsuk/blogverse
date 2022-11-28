<?php

namespace App\Enum;

use App\Constant\RoleId;
use App\Constant\RoleName;
use App\Constant\RolePermission;

enum Role{
    case ADMIN;
    case MODERATOR;
    case GUEST;

    /**
     * Allows to give the id of the role in relation to the enumeration
     * @return int
     */
    public function getId(): int{
        return match ($this) {
            self::ADMIN => RoleId::ADMIN,
            self::MODERATOR => RoleId::MODERATOR,
            default => RoleId::GUEST
        };
    }

    /**
     * Allows to give the name of the role in relation to the enumeration
     * @return string
     */
    public function getName(): string{
        return match ($this) {
            self::ADMIN => RoleName::ADMIN,
            self::MODERATOR => RoleName::MODERATOR,
            default => RoleName::GUEST
        };
    }

    /**
     * Give the permissions of the role in relation to the enumeration
     * @return array|string[]
     */
    public function getPermission(): array{
        return match ($this) {
            self::ADMIN => RolePermission::ADMIN,
            self::MODERATOR => RolePermission::MODERATOR,
            default => RolePermission::GUEST
        };
    }

    /**
     * Allows to retrieve a role in relation to an id
     * @param int $id
     * @return Role
     */
    public static function idToRole(int $id): Role{
        return match ($id){
            RoleId::ADMIN => self::ADMIN,
            RoleId::MODERATOR => self::MODERATOR,
            default => self::GUEST
        };
    }
}


