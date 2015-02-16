<?php
/**
 * Created by IntelliJ IDEA.
 * User: fingolfintek
 * Date: 15.2.15.
 * Time: 00.46
 */
class CareerEvent implements JsonSerializable
{

    function __construct($year, $description)
    {
        $this->year = $year;
        $this->description = $description;
    }

    /**
     * (PHP 5 &gt;= 5.4.0)<br/>
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     */
    function jsonSerialize() {
        return ["year" => $this->year, "description" => $this->description];
    }
}
