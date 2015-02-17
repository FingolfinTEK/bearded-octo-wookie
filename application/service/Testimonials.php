<?php

/**
 * Created by IntelliJ IDEA.
 * User: fingolfintek
 * Date: 16.2.15.
 * Time: 10.29
 */

require_once "BaseDbService.php";
require_once __DIR__ . "/../model/Testimonial.php";

class Testimonials extends BaseDbService
{
    function __construct()
    {
        parent::__construct("testimonials");
    }


    /**
     * @param $record
     * @return Testimonial
     */
    protected function mapSingleRecord($record)
    {
        return new Testimonial($record["author_name"], $record["author_title"], $record["testimonial"],
            $record["image_url"], $record["testimonial_url"], $record["work_relationship"]);
    }
}
