<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/controller/utility.php";

session_start();
session_destroy();

$url = '/pages/Homepage.php';

Utility\log($url);

header("Location:" . $url);
