<?php

use Propel\PoctDevice;
use Propel\PoctDeviceQuery;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\User;
use Propel\UserQuery;
use Sabre\HTTP\Response;

require $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";
require $_SERVER["DOCUMENT_ROOT"] . "/generated-conf/config.php";

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
