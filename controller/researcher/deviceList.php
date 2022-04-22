<?php

/**
 * This is a page-access controller.
 * Other way of accessing this file will be redirect back to Dashboard.php
 */

/**
 * Exit conditions to check if the controller is not accessed by php page
 */
if (!isset($_SESSION)) session_start();
defined("AUTHORIZED_USER") or define("AUTHORIZED_USER", array("RESEARCHER"));

use Propel\PoctDeviceQuery as DeviceQuery;
use Propel\PoctDeviceAditionalInfoQuery as DocumentQuery;

require_once $_SERVER["DOCUMENT_ROOT"] . "/controller/utility.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/generated-conf/config.php";

/**
 * Researcher Authorization
 */
if (Utility\userAuthorization($_SESSION["user_type"], AUTHORIZED_USER, true)) {

  function deviceList()
  {
    $documentQuery = DocumentQuery::create()->filterByUserUserId($_SESSION['user_id'])->find();
    
    $deviceIds = [];
    foreach ($documentQuery as $document) {
      $deviceIds[] = $document->getIdpoctDevice();
    }

    $deviceQuery = DeviceQuery::create()->findPks($deviceIds);
    
    $devices = [];
    foreach ($deviceQuery as $device) {
      $temp = [
        "PoctDeviceId" => $device->getPoctDeviceId(),
        "ManufactureName" => $device->getPoctDeviceManufactureName(),
        "GenericName" => $device->getPoctDeviceGenericName(),
        "DeviceModel" => $device->getDeviceModel(),
        "DeviceType" => $device->getDeviceType()
      ];
      $devices[] = $temp;
    }

    return $devices;
  }
}
