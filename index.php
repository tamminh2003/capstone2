<?php

require_once "vendor/autoload.php";
require_once "generated-conf/config.php";
require_once "controller/utility.php";

$url = '/pages/Homepage.php';

Utility\log("Redirect to " . $url);

header("Location:" . $url);
