<?php

use Propel\PoctDeviceQuery;

require_once $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/generated-conf/config.php";

function deviceList()
{
  $deviceQuery = new PoctDeviceQuery();
  $result = $deviceQuery->findByUserUserId($_SESSION['user_id']);
  $devices = [];

  foreach ($result as $device) {
    $temp = [];
    $temp["PoctDeviceId"] = $device->getPoctDeviceId();
    $temp["ManufactureName"] = $device->getPoctDeviceManufactureName();
    $temp["GenericName"] = $device->getPoctDeviceGenericName();
    $temp["DeviceModel"] = $device->getDeviceModel();
    $temp["DeviceType"] = $device->getDeviceType();

    $devices[] = $temp;
  }

  return $devices;
}
