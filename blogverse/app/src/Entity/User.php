<?php

namespace App\Entity;

use App\Enum\Role;

class User extends BaseEntity implements UserInterface, PasswordProtectedInterface
{
    /**
     * @param int $id
     * @param string $username
     * @param string $password
     * @param Role $role
     */
    public function __construct(
        private int $id,
        private string $username,
        private string $password,
        private Role $role = Role::GUEST

    )
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): User
    {
        $this->id = $id;
        return $this;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): User
    {
        $this->username = $username;
        return $this;
    }

    public function getRole():Role
    {
        return $this->role;
    }

    public function setRole(Role $role): User
    {
        $this->role = $role;
        return $this;
    }


    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): User
    {
        $this->password = $password;

        return $this;
    }

    public function passwordMatch(string $plainPwd): bool
    {
        return true;
    }
}
