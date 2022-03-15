<?php

require $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";

session_start();
session_destroy();

$url = $_SEVER['HTTP_HOST'] . '/pages/Homepage.php';
header("Location:" . $url);
