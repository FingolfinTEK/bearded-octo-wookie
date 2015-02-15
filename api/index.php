<?php
/**
 * Created by IntelliJ IDEA.
 * User: fingolfintek
 * Date: 14.2.15.
 * Time: 00.46
 */
require_once __DIR__ . '/../vendor/autoload.php';
require __DIR__ . "/model/Quote.php";

use Respect\Rest\Router;

$r3 = new Router("/api");
$r3->get('/quotes', function () {
    $database = new medoo([
        'database_type' => 'mysql',
        'database_name' => 'hashcode_website',
        'server' => 'localhost',
        'username' => 'hashcode_admin',
        'password' => 'hcHithlum19',
        'charset' => 'utf8'
    ]);

    $resultSet = $database->select("quotes", [
        "author",
        "quote_text"
    ]);

    $quotes = [];
    foreach ($resultSet as $record) {
        array_push($quotes, new Quote($record["author"], $record["quote_text"]));
    }
    return json_encode($quotes);
});
