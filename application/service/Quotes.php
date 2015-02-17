<?php

/**
 * Created by IntelliJ IDEA.
 * User: fingolfintek
 * Date: 16.2.15.
 * Time: 10.29
 */

require_once "BaseDbService.php";
require_once __DIR__ . "/../model/Quote.php";

class Quotes extends BaseDbService
{
    function __construct()
    {
        parent::__construct("quotes", ["author", "quote_text"]);
    }

    /**
     * @param $record
     * @return Testimonial
     */
    protected function mapSingleRecord($record)
    {
        return new Quote($record["author"], $record["quote_text"]);
    }
}
