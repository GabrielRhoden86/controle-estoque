<?php

namespace App\Model;

class ClassConexao
{
    public function conexaoDb()
    {
        try {
            $con = new \PDO("mysql:host=" . HOST . ";dbname=" . DB . "", "" . USER . "", "" . PASS . "");
            return $con;
        } catch (\PDOException $erro) {
            return $erro->getMessage();
        }
    }
}
