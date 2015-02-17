<?php

/**
 * Created by IntelliJ IDEA.
 * User: fingolfintek
 * Date: 15.2.15.
 * Time: 00.46
 */
class Testimonial implements JsonSerializable
{

    function __construct($author, $authorTitle, $testimonial, $imageUrl, $testimonialUrl, $workRelationship)
    {
        $this->author = $author;
        $this->authorTitle = $authorTitle;
        $this->testimonial = $testimonial;
        $this->imageUrl = $imageUrl;
        $this->testimonialUrl = $testimonialUrl;
        $this->workRelationship = $workRelationship;
    }

    /**
     * (PHP 5 &gt;= 5.4.0)<br/>
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     */
    function jsonSerialize()
    {
        return ["author" => $this->author, "authorTitle" => $this->authorTitle, "testimonial" => $this->testimonial,
            "imageUrl" => $this->imageUrl, "testimonialUrl" => $this->testimonialUrl,
            "workRelationship" => $this->workRelationship];
    }
}
