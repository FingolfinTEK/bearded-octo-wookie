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
        $this->config = parse_ini_file(__DIR__ . "/../config/database.ini");
        $this->database = new medoo($this->config);
    }

    public function select($table, $join, $columns = null, $where = null)
    {
        return $this->database->select($table, $join, $columns, $where);
    }
}
