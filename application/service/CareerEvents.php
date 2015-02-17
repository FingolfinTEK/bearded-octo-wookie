<?php

/**
 * Created by IntelliJ IDEA.
 * User: fingolfintek
 * Date: 16.2.15.
 * Time: 10.29
 */

require_once "BaseDbService.php";
require_once __DIR__ . "/../model/CareerEvent.php";

class CareerEvents extends BaseDbService
{
    function __construct()
    {
        parent::__construct("career_events", ["year", "description"], ["ORDER" => ["year", "event_id"]]);
    }

    /**
     * @param $record
     * @return Testimonial
     */
    protected function mapSingleRecord($record)
    {
        return new CareerEvent($record["year"], $record["description"]);
    }
}
