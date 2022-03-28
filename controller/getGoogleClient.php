<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

/**
 * Set up client
 */
$config = $_SERVER['DOCUMENT_ROOT'] . "/service_account_credentials.json";

$client = new Google\Client();
$client->setApplicationName('Capstone2');
$client->setAuthConfig($config);
$client->addScope("https://www.googleapis.com/auth/drive");
