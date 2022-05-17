<?php

use Propel\PoctDeviceQuery;

require $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";
require $_SERVER["DOCUMENT_ROOT"] . "/generated-conf/config.php";

function deviceList()
{
  $deviceQuery = new PoctDeviceQuery();
  $result = $deviceQuery->findByUserUserId($_SESSION['user_id']);

  // $result = $deviceQuery->findByUserUserId('4');
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