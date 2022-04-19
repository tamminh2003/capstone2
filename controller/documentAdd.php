<?php

require_once $_SERVER["DOCUMENT_ROOT"] ."/vendor/autoload.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/controller/utility.php";

$client = Utility\getGoogleClient();
$drive = new Google\Service\Drive($client);

$target_file = $_FILES["upload"]["tmp_name"];

$file = new Google\Service\Drive\DriveFile();
$file->setName("placholder_test.jpeg");

$result = $service->files->create(
  $file,
  array(
    'data' => file_get_contents($target_file),
    'mimeType' => 'application/octet-stream',
    'uploadType' => 'media'
  )
);

$redirect_uri = "http://localhost:8000/pages/Manufacturer/DeviceList.php" . //device_id;
header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
