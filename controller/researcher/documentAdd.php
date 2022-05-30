<?php

/**
 * This is a api-access controller.
 * Other way of accessing this file will be redirect back to DeviceList.php
 */

/**
 * Exit conditions to check if the controller is not accessed by php page
 */
if (!isset($_SESSION)) session_start();
defined("AUTHORIZED_USER") or define("AUTHORIZED_USER", array("RESEARCHER"));

require_once $_SERVER["DOCUMENT_ROOT"] . "/controller/utility.php";
Utility\userAuthorization($_SESSION["user_type"], AUTHORIZED_USER, false);

use Propel\PoctDeviceAditionalInfo;

require_once $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/generated-conf/config.php";

/**
 * Set up google api client and drive api
 */
$client = Utility\getGoogleClient();
$service = new Google\Service\Drive($client);

/**
 * Add new file
 */
$file = new Google\Service\Drive\DriveFile();
$file->setName($_FILES["file"]["name"]);
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
$filetype = "research";
$document = new PoctDeviceAditionalInfo();
$document->setIdpoctDevice($_POST["device_id"]);
$document->setUserUserId($_POST["user_id"]);
$document->setPoctDeviceAditionalInfoLabel($_FILES["file"]["name"]);
$document->setPoctDeviceAditionalInfoType($filetype);
$document->setPoctDeviceAditionalInfoDetails($file->id);
$saved = $document->save();

/**
 * Return success or failure and redirect back to confirmation page.
 */

echo ("success");
