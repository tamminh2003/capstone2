<?php

require_once $_SERVER["DOCUMENT_ROOT"] ."/vendor/autoload.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/controller/utility.php";

$client = Utility\getGoogleClient();
$drive = new Google\Service\Drive();