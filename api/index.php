<?php
/**
 * Created by IntelliJ IDEA.
 * User: fingolfintek
 * Date: 14.2.15.
 * Time: 00.46
 */
require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../application/model/Quote.php";
require_once __DIR__ . "/../application/service/Mailer.php";
require_once __DIR__ . "/../application/DB.php";

use Respect\Rest\Router;

$router = new Router("/api");

$router->post("/contact", function () {
    $mailer = new Mailer();
    $mailer->sendMail();
});

$router->get("/quotes", function () {
    $logger = new Katzgrau\KLogger\Logger(__DIR__ . '/../../logs');
    $logger->info("Fetching quotes");
    
    $db = new DB();
    $resultSet = $db->select("quotes", [
        "author",
        "quote_text"
    ]);

    $quotes = [];
    $logger->info("Found " . count($resultSet) . " quotes");
    foreach ($resultSet as $record) {
        array_push($quotes, new Quote($record["author"], $record["quote_text"]));
    }
    return json_encode($quotes);
});
