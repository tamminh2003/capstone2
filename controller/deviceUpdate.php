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
	"deviceType" => $deviceType,
	"deviceDescription" => $deviceDescription,
	"device_id" =>$deviceId
] = $_POST;

$device = PoctDeviceQuery::create()->findOneByPoctDeviceId($deviceId);

$device->setPoctDeviceManufactureName($manufactureName);
$device->setPoctDeviceGenericName($deviceName);
$device->setDeviceModel($deviceModel);
$device->setDeviceType($deviceType);
$device->setDeviceDescripition($deviceDescription);
$saveResult = $device->save();

$response = new Response();

if ($saveResult == 0) {
	$response->setStatus(400); // Bad request
	$response->setBody(
		'Something went wrong.'
	);
	Sabre\HTTP\Sapi::sendResponse($response);
	exit();
}

$response->setStatus(201);
$response->setHeader("Content-Type", "application/json");
$response->setBody("{\"deviceId\":{$deviceId}}");
Sabre\HTTP\Sapi::sendResponse($response);
