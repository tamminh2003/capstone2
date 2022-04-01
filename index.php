<?php

require "vendor/autoload.php";
require "generated-conf/config.php";
require "controller/utility.php";

$url = '/pages/Homepage.php';

Utility\log("Redirect to " . $url);

header("Location:".$url);
