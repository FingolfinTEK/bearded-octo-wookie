<?php
/**
 * Created by IntelliJ IDEA.
 * User: fingolfintek
 * Date: 14.2.15.
 * Time: 00.46
 */
require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../application/model/Quote.php";
require_once __DIR__ . "/../application/model/CareerEvent.php";
require_once __DIR__ . "/../application/service/Mailer.php";
require_once __DIR__ . "/../application/service/Quotes.php";
require_once __DIR__ . "/../application/service/CareerEvents.php";
require_once __DIR__ . "/../application/DB.php";

use Respect\Rest\Router;

$router = new Router("/api");

$router->post("/contact", function () {
    $mailer = new Mailer();
    return $mailer->sendMail();
});

$router->get("/quotes", function () {
    $quotes = new Quotes();
    return json_encode($quotes->getQuotesFromDb());
});

$router->get("/career-events", function () {
    $events = new CareerEvents();
    return json_encode($events->getCareerEventsFromDb());
});
