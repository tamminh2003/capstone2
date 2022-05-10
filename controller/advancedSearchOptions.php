<?php

use Propel\PoctDeviceQuery;
use Propel\Map\PoctDeviceTableMap;
use Propel\PoctDevice;
use Propel\User;
use Propel\UserQuery;

use Propel\Runtime\Propel;
use Propel\Runtime\Formatter\ObjectFormatter;

require $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";
require $_SERVER["DOCUMENT_ROOT"] . "/generated-conf/config.php";

function populateManufacturerDropdown()
{
  $userQuery = new UserQuery();


  $result = $userQuery->findByUserType('MANUFACTURER');


  $manufacturers = [];

  foreach ($result as $user) {
    $temp = [];
    $temp["UserId"] = $user->getUserId();
    $temp["CompanyName"] = $user->getUserCompany();


    $manufacturers[] = $temp;
  }

  return $manufacturers;
}

function populateDeviceTypeDropdown()
{
  $deviceQuery = new PoctDeviceQuery();


  $result = $deviceQuery->find();


  $devices = [];

  foreach ($result as $device) {
    $temp = [];
    $temp["PoctDeviceId"] = $device->getPoctDeviceId();
    $temp["DeviceType"] = $device->getDeviceType();


    $devices[] = $temp;
  }

  return $devices;
}


