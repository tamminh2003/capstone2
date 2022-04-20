<?php
session_start();

use Propel\PoctDeviceAditionalInfo;

require_once $_SERVER["DOCUMENT_ROOT"] ."/vendor/autoload.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/controller/utility.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/generated-conf/config.php";

/**
 * Authorisation for MANUFACTURER
 */
const AUTHORIZED_USER = ['MANUFACTURER'];
Utility\userAuthorization();

/**
 * Set up google api client and drive api
 */
$client = Utility\getGoogleClient();
$service = new Google\Service\Drive($client);

/**
 * Add new file
 */
$file = new Google\Service\Drive\DriveFile();
$file->setName($_POST["filename"]);
$file = $service->files->create(
  $file,
  array(
    'data' => file_get_contents($_FILES["file"]["tmp_name"]),
    'mimeType' => 'application/octet-stream',
    'uploadType' => 'media'
  )
);

/**
 * Add file permission
 */
$permission = new Google\Service\Drive\Permission();
$permission->setType("anyone");
$permission->setRole("reader");

$result = $service->permissions->create($file->id, $permission);

$optParams = array(
  'fields' => 'id, name, webContentLink, webViewLink'
);

$result = $service->files->get($file->id, $optParams);

/**
 * Add file to database
 */
$document = new PoctDeviceAditionalInfo();
$document->setIdpoctDevice($_POST["device_id"]);
$document->setUserUserId($_POST["user_id"]);
$document->setPoctDeviceAditionalInfoLabel($_POST["filename"]);
$document->setPoctDeviceAditionalInfoType("Document");
$document->setPoctDeviceAditionalInfoDetails($file->id);
$saved = $document->save();

/**
 * Return success or failure and redirect back to confirmation page.
 */

$redirect_uri = "http://localhost:8000/pages/Manufacturer/DeviceList.php" . //device_id;
header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
