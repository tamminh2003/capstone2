<?php

/**
 * This is a page-access controller.
 * Other way of accessing this file will be redirect back to Dashboard.php
 */

/**
 * Exit conditions to check if the controller is not accessed by php page
 */
if (!isset($_SESSION)) session_start();
defined("AUTHORIZED_USER") or define("AUTHORIZED_USER", array("MANUFACTURER"));

use Propel\PoctDeviceQuery as DeviceQuery;

require_once $_SERVER["DOCUMENT_ROOT"] . "/controller/utility.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/generated-conf/config.php";

/**
 * Manufacturer Authorization
 */
if (Utility\userAuthorization($_SESSION["user_type"], AUTHORIZED_USER, true)) {

  function deviceList()
  {
    $deviceQuery = DeviceQuery::create()->filterByUserUserId($_SESSION['user_id'])->find();
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
