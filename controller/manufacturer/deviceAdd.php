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


/**
 * Manufacturer Authorisation
 */
require_once $_SERVER["DOCUMENT_ROOT"] . "/controller/utility.php";
Utility\userAuthorization($_SESSION["user_type"], AUTHORIZED_USER, false);

use Propel\PoctDevice;
use Propel\PoctDeviceQuery;
use Propel\Runtime\ActiveQuery\Criteria;
use Sabre\HTTP\Response;

require_once $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/generated-conf/config.php";

[
	"manufactureName" => $manufactureName,
	"deviceName" => $deviceName,
	"deviceModel" => $deviceModel,
	"deviceImgUrl" => $deviceImgUrl,
	"deviceType" => $deviceType,
	"deviceDescription" => $deviceDescription,
	"user_id" => $userId
] = $_POST;

$device = new PoctDevice();
$device->setPoctDeviceManufactureName($manufactureName);
$device->setPoctDeviceGenericName($deviceName);
$device->setDeviceModel($deviceModel);
$device->setDeviceImageUrl($deviceImgUrl);
$device->setDeviceType($deviceType);
$device->setDeviceDescripition($deviceDescription);
$device->setUserUserId($userId);
$saveResult = $device->save();

$deviceId = PoctDeviceQuery::create()
	->limit(1)
	->orderByPoctDeviceId(Criteria::DESC)
	->find()
	->getFirst()
	->getPoctDeviceId();

$response = new Response();

if ($saveResult == 0) {
	$response->setStatus(409); // Conflict
	$response->setBody(
		'Warning: Already In Save. See Propel documentation.'
	);
	Sabre\HTTP\Sapi::sendResponse($response);
	exit();
}

$response->setStatus(201);
$response->setHeader("Content-Type", "application/json");
$response->setBody("{\"deviceId\":{$deviceId}}");
Sabre\HTTP\Sapi::sendResponse($response);
