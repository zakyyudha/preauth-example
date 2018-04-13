<?php

namespace Pdsi\DartoHelm;

use DartoHelm\Utils\Sql;
use Pdsi\Database\DBConnection;

class DartoSqlUtils extends Sql{
//
//    public $connection;
//
//    public function __construct($configDb)
//    {
//        $this->connection = new DBConnection($configDb);
//    }

    public function execute($sql)
    {
        return $this->connection()->runQuery($sql);
    }

    public function find($sql)
    {
        return $this->connection()->getQuery($sql)->fetchAll();
    }

    public function connection()
    {
        return new DBConnection($this->getConfig());
    }

    public function getConfig()
    {
        return include(__DIR__ . '/../../config/database.php');
    }

}