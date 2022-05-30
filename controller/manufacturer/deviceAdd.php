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

use Propel\Disease;
use Propel\DiseaseQuery;
use Propel\PoctDevice;
use Propel\PoctDeviceHasDisease;
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
	"user_id" => $userId,
	"disease" => $diseaseDetails
] = $_POST;

// Add device to device table
$device = new PoctDevice();
$device->setPoctDeviceManufactureName($manufactureName);
$device->setPoctDeviceGenericName($deviceName);
$device->setDeviceModel($deviceModel);
$device->setDeviceImageUrl($deviceImgUrl);
$device->setDeviceType($deviceType);
$device->setDeviceDescripition($deviceDescription);
$device->setUserUserId($userId);
$saveResult = $device->save();

// Check if disease exist in the table
if (isset($diseaseDetails)) {
	foreach ($diseaseDetails as $eachDisease) {
		$diseaseCode = explode('-$-', $eachDisease)[0];
		$diseaseName = explode('-$-', $eachDisease)[1];

		// Search Disease table for matching disease code
		$diseaseQuery = DiseaseQuery::create()->findByDiseaseApiKey($diseaseCode);

		if ($diseaseQuery->isEmpty()) {
			// Add disease to disease table
			$disease = new Disease();
			$disease->setDiseaseName($diseaseName);
			$disease->setDiseaseApiKey($diseaseCode);
			$disease->setDiseaseGroup("01");
			$disease->save();
		} else {
			// Ignore if disease already exist.
			$disease = $diseaseQuery->getFirst();
		}

		// Associate device and disease
		$device_disease = new PoctDeviceHasDisease();
		$device_disease->setPoctDeviceId($device->getPoctDeviceId());
		$device_disease->setDiseaseId($disease->getDiseaseId());
		$device_disease->save();
	}
}

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
