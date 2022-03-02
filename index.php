<?php

require "vendor/autoload.php";
require "generated-conf/config.php";

$url = $_SEVER['HTTP_HOST'] . '/pages/Homepage.php';
header("Location:".$url);
