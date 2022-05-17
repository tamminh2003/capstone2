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

use Propel\PoctDeviceAditionalInfoQuery as DocumentQuery;

require_once $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/generated-conf/config.php";

/**
 * Set up google api client and drive api
 */
$client = Utility\getGoogleClient();
$service = new Google\Service\Drive($client);

/**
 * Get document record
 */
$documentId = $_POST["id"];
$document = DocumentQuery::create()->findOneByPoctDeviceAditionalInfoId($documentId);
$fileId = $document->getPoctDeviceAditionalInfoDetails();

/**
 * Delete file on google drive
 */
$file = new Google\Service\Drive\DriveFile();
$result = $service->files->delete($fileId); // Google Drive return empty response if successful

/**
 * Remove file from database
 */
$document->delete(); // delete method return void

/**
 * Return success or failure and redirect back to confirmation page.
 */
echo ("success");
