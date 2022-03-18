<?php

require $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";

session_start();
session_destroy();

$url = '/pages/Homepage.php';
header("Location:" . $url);
