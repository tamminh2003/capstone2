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

function populateDeviceConnectionTypeDropdown()
{
  $deviceQuery = new PoctDeviceQuery();


  $result = $deviceQuery->find();
  
  $devices = [];

  foreach ($result as $device) {
    
    $temp = [];
    $temp["PoctDeviceId"] = $device->getPoctDeviceId();
    $device_Type= $device->getDeviceType();
    $temp["DeviceType"] = $device_Type;

    if(in_array($device_Type, $devices,TRUE)){
     
    }else{
      $devices[] = $temp;
    }

   
  }

  return $devices;
}




function populateDeviceEnergyTypeDropdown()
{
  $deviceQuery = new PoctDeviceQuery();


  $result = $deviceQuery->find();
  

/* $result = $deviceQuery->find();
 */
  $devices = [];

  foreach ($result as $device) {
    
    $temp = [];
    $temp["PoctDeviceId"] = $device->getPoctDeviceId();
    $device_Type= $device->getDeviceType();
    $temp["DeviceType"] = $device_Type;

    if(in_array($device_Type, $devices,TRUE)){
     
    }else{
      $devices[] = $temp;
    }

   
  }

  return $devices;
}




function populateDeviceTypeDropdown()
{
  $deviceQuery = new PoctDeviceQuery();


  $result = $deviceQuery->find();
  

/* $result = $deviceQuery->find();
 */
  $devices = [];

  foreach ($result as $device) {
    
    $temp = [];
    $temp["PoctDeviceId"] = $device->getPoctDeviceId();
    $device_Type= $device->getDeviceType();
    $temp["DeviceType"] = $device_Type;

    if(in_array($device_Type, $devices,TRUE)){
     
    }else{
      $devices[] = $temp;
    }

   
  }

  return $devices;
}


