<?php
use Propel\PoctDevice;
use Propel\PoctDeviceQuery;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\User;
use Propel\UserQuery;
use Sabre\HTTP\Response;

require $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";
require $_SERVER["DOCUMENT_ROOT"] . "/generated-conf/config.php";
require $_SERVER["DOCUMENT_ROOT"] . "/controller/utility.php";

["id" => $deviceId] = $_POST;

$device = PoctDeviceQuery::create()->findOneByPoctDeviceId($deviceId);

if (!$device || $device == null ) {
  Utility\log("No device found for deletion.");
  $response = new Response();
  $response->setStatus(400); // Bad Request
  $response->setBody("fail");
  Sabre\HTTP\Sapi::sendResponse($response);
  exit();
}

Utility\log("Device found for deletion.");
$device->delete();

$response = new Response();
$response->setStatus(200);
$response->setBody("success");
Sabre\HTTP\Sapi::sendResponse($response);
