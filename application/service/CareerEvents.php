<?php

/**
 * Created by IntelliJ IDEA.
 * User: fingolfintek
 * Date: 16.2.15.
 * Time: 10.29
 */
class CareerEvents
{
    function __construct()
    {
        $this->logger = new Katzgrau\KLogger\Logger(__DIR__ . "/../../../logs");
    }

    /**
     * @return array
     */
    public function getCareerEventsFromDb()
    {
        $this->logger->info("Fetching career events");
        $resultSet = $this->fetchFromDb();

        $this->logger->info("Found " . count($resultSet) . " career events");
        return $this->mapToCareerEvents($resultSet);
    }

    /**
     * @return array|bool
     */
    private function fetchFromDb()
    {
        $db = new DB();
        return $db->select("career_events", [
            "year",
            "description"
        ], [
            "ORDER" => ["year", "event_id"]
        ]);
    }

    /**
     * @param $resultSet
     * @return array
     */
    private function mapToCareerEvents($resultSet)
    {
        $quotes = [];
        foreach ($resultSet as $record) {
            array_push($quotes, new CareerEvent($record["year"], $record["description"]));
        }
        return $quotes;
    }
}
