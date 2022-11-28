<?php

namespace App\Manager;

use App\Factory\Pdo;

abstract class BaseManager
{
    protected \PDO $pdo;

    public function __construct(Pdo $database)
    {
        $this->pdo = $database->getMySqlPDO();
    }
}
