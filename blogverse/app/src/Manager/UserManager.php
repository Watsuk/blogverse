<?php

namespace App\Manager;

use App\Entity\User;

class UserManager extends BaseManager
{
    public function getAllUsers(): array
    {
        $query = $this->pdo->query("select * from User");

        $users = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $users[] = new User($data);
        }
        var_dump($data);

        return $users;
    }

    public function getByUsername(string $username): ?User
    {
        $query = $this->pdo->prepare("SELECT * FROM User WHERE username = :username");
        $query->bindValue("username", $username, \PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetch(\PDO::FETCH_ASSOC);

        if ($data) {
            return new User($data);
        }

        return null;
    }

    public function insertUser(User $user)
    {
        $query = $this->pdo->prepare("INSERT INTO User (password, username), VALUES (:password, :username)");
        $query->bindValue("password", $user->getHashedPassword(), \PDO::PARAM_STR);
        $query->bindValue("username", $user->getUsername(), \PDO::PARAM_STR);
        $query->execute();
    }

    public function updateRoleUser(User $id, User $up)
    {
        $query = $this->pdo->prepare("UPDATE User SET role=:roles where id = :id");
        $query->bindValue("roles", $up->getRole(), \PDO::PARAM_STR);
        $query->bindValue("id", $id->getId(), \PDO::PARAM_STR);
        $query->execute();
    }

    public function deleteUser(User $id)
    {
        $query = $this->pdo->prepare("DELETE FROM User where id = :id");
        $query->bindValue("id", $id->getId(), \PDO::PARAM_STR);
        $query->execute();
    }
}