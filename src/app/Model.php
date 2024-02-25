<?php

declare(strict_types=1);

namespace App;

abstract class Model
{
    protected DB $db;
    public function __contruct()
    {
        $this->db = App::db();
    }
}
