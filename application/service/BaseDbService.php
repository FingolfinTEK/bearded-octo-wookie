<?php

/**
 * Created by IntelliJ IDEA.
 * User: fingolfintek
 * Date: 16.2.15.
 * Time: 13.34
 */

require_once __DIR__ . "/../DB.php";

abstract class BaseDbService
{
    function __construct($tableName, $columns = "*", $where = null)
    {
        $this->logger = new Katzgrau\KLogger\Logger(__DIR__ . '/../../../logs');
        $this->tableName = $tableName;
        $this->columns = $columns;
        $this->where = $where;
    }

    /**
     * @return array
     */
    public function getDataFromDb()
    {
        $this->logger->info("Fetching from " . $this->tableName);
        $resultSet = $this->fetchFromDb();

        $this->logger->info("Found " . count($resultSet) . " records in " . $this->tableName);
        return $this->mapToDto($resultSet);
    }

    /**
     * @return array|bool
     */
    private function fetchFromDb()
    {
        $db = new DB();
        return $db->select($this->tableName, $this->columns, $this->where);
    }

    /**
     * @param $resultSet
     * @return array
     */
    private function mapToDto($resultSet)
    {
        $testimonials = [];
        foreach ($resultSet as $record) {
            array_push($testimonials, $this->mapSingleRecord($record));
        }
        return $testimonials;
    }

    /**
     * @param $record
     * @return Testimonial
     */
    protected abstract function mapSingleRecord($record);

}
