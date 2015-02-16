<?php

/**
 * Created by IntelliJ IDEA.
 * User: fingolfintek
 * Date: 16.2.15.
 * Time: 10.29
 */
class Quotes
{
    function __construct()
    {
        $this->logger = new Katzgrau\KLogger\Logger(__DIR__ . '/../../../logs');
    }

    /**
     * @return array
     */
    public function getQuotesFromDb()
    {
        $this->logger->info("Fetching quotes");
        $resultSet = $this->fetchFromDb();

        $this->logger->info("Found " . count($resultSet) . " quotes");
        return $this->mapToQuotes($resultSet);
    }

    /**
     * @return array|bool
     */
    private function fetchFromDb()
    {
        $db = new DB();
        return $db->select("quotes", [
            "author",
            "quote_text"
        ]);
    }

    /**
     * @param $resultSet
     * @return array
     */
    private function mapToQuotes($resultSet)
    {
        $quotes = [];
        foreach ($resultSet as $record) {
            array_push($quotes, new Quote($record["author"], $record["quote_text"]));
        }
        return $quotes;
    }
}
