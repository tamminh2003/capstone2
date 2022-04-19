<?php

require_once $_SERVER["DOCUMENT_ROOT"] ."/vendor/autoload.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/controller/utility.php";

/**
 * Set up google api client and drive api
 */
$client = Utility\getGoogleClient();
$drive = new Google\Service\Drive($client);

/**
 * Create new file on google drive
 */
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

/**
 * Create file permission
 */
$permission = new Google\Service\Drive\Permission();
$permission->setType("anyone");
$permission->setRole("reader");

$fileId = "14R4OzcmH82FT41XZPGStTsrVCkfHsRmK";

$result = $service->permissions->create($fileId, $permission);

$optParams = array(
  'fields' => 'id, name, webContentLink, webViewLink'
);

$result = $service->files->get($fileId, $optParams);

/**
 * Return success or failure and redirect back to confirmation page.
 */

$redirect_uri = "http://localhost:8000/pages/Manufacturer/DeviceList.php" . //device_id;
header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
