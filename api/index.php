<?php
/**
 * Created by IntelliJ IDEA.
 * User: fingolfintek
 * Date: 14.2.15.
 * Time: 00.46
 */
require_once __DIR__ . '/../vendor/autoload.php';
require __DIR__ . "/../application/model/Quote.php";
require __DIR__ . "/../application/DB.php";

use Respect\Rest\Router;

$r3 = new Router("/api");
$r3->get('/quotes', function () {
    $db = new DB();
    $resultSet = $db->select("quotes", [
        "author",
        "quote_text"
    ]);

    $quotes = [];
    foreach ($resultSet as $record) {
        array_push($quotes, new Quote($record["author"], $record["quote_text"]));
    }
    return json_encode($quotes);
});
