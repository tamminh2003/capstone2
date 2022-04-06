<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/controller/getGoogleClient.php';

$service = new Google\Service\Drive($client);

$permission = new Google\Service\Drive\Permission();
$permission->setType("anyone");
$permission->setRole("reader");

$fileId = "14R4OzcmH82FT41XZPGStTsrVCkfHsRmK";

$result = $service->permissions->create($fileId, $permission);

$optParams = array(
  'fields' => 'id, name, webContentLink, webViewLink'
);

$result = $service->files->get($fileId, $optParams);

var_dump($result);
