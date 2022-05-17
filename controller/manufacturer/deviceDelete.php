<?php

/**
 * This is a api-access controller.
 * Other way of accessing this file will be redirect back to DeviceList.php
 */

/**
 * Exit conditions to check if the controller is not accessed by php page
 */
if (!isset($_SESSION)) session_start();
defined("AUTHORIZED_USER") or define("AUTHORIZED_USER", array("MANUFACTURER"));

require_once $_SERVER["DOCUMENT_ROOT"] . "/controller/utility.php";
Utility\userAuthorization($_SESSION["user_type"], AUTHORIZED_USER, false);

use Propel\PoctDeviceQuery;
use Sabre\HTTP\Response;

require_once $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/generated-conf/config.php";

$device = PoctDeviceQuery::create()->findOneByPoctDeviceId($_POST["id"]);

if (!$device || $device == null) {
  Utility\log("No device found for deletion.");
  $response = new Response();
  $response->setStatus(400); // Bad Request
  $response->setBody("fail");
  Sabre\HTTP\Sapi::sendResponse($response);
  exit();
}

if($device->getUserUserId() != $_SESSION["user_id"]) {
  echo "Unauthorised access";
  exit();
}

Utility\log("Device found for deletion.");
$device->delete();

$response = new Response();
$response->setStatus(200);
$response->setBody("success");
Sabre\HTTP\Sapi::sendResponse($response);
