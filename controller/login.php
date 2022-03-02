<?php
require $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";
require $_SERVER["DOCUMENT_ROOT"] . "/generated-conf/config.php";

use Sabre\HTTP\Response;

$response = new Response();

$response->setStatus(200);
$response->setBody("hello");

Sabre\HTTP\SAPI::sendResponse($response);
