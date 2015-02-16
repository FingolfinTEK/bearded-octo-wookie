<?php

/**
 * Created by IntelliJ IDEA.
 * User: fingolfintek
 * Date: 15.2.15.
 * Time: 01.11
 */
class DB
{

    function __construct()
    {
        $this->logger = new Katzgrau\KLogger\Logger(__DIR__ . '/../../logs');
        $this->config = parse_ini_file(__DIR__ . "/../config/database.ini");
        $this->logger->info("Loaded DB configuration", $this->config);
        $this->database = new medoo($this->config);
        $this->logger->info("Created DB connection", [$this->database]);
    }

    public function select($table, $join, $columns = null, $where = null)
    {
        return $this->database->select($table, $join, $columns, $where);
    }
}
