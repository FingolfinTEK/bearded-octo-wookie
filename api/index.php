<?php
/**
 * Created by IntelliJ IDEA.
 * User: fingolfintek
 * Date: 14.2.15.
 * Time: 00.46
 */

require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../application/service/Mailer.php";
require_once __DIR__ . "/../application/service/Quotes.php";
require_once __DIR__ . "/../application/service/CareerEvents.php";
require_once __DIR__ . "/../application/service/Testimonials.php";

use Respect\Rest\Router;

$router = new Router("/api");

$router->post("/contact", function () {
    $mailer = new Mailer();
    return $mailer->sendMail();
});

$router->get("/quotes", function () {
    return getJsonFromService(new Quotes());
});

$router->get("/career-events", function () {
    return getJsonFromService(new CareerEvents());
});

$router->get("/testimonials", function () {
    return getJsonFromService(new Testimonials());
});

/**
 * @param $service BaseDbService
 * @return string
 */
function getJsonFromService($service)
{
    return json_encode($service->getDataFromDb());
}
