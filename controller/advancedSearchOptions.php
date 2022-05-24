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
  
  $deviceconnectionTypes = [];

  foreach ($result as $device) {
    
    
    $device_Connection_Type= $device->getDeviceConnectionType();
    

    if(in_array($device_Connection_Type, $deviceconnectionTypes)){
     
    }else{
      $deviceconnectionTypes[] = $device_Connection_Type;
    }

   
  }

  return $deviceconnectionTypes;
}

function populateDeviceConnectionTypeFromManufacturer($manufacturer)
{

  $userQuery = new UserQuery();
  $resultuser = $userQuery->findByUserCompany($manufacturer);

    foreach ($resultuser as $user) {
    
    
    $deviceQuery = new PoctDeviceQuery();


    $result = $deviceQuery->findByUserUserId($user->getUserId());
   
    $devices = [];
  
    foreach ($result as $device) {
      
          
      $device_Type= $device->getDeviceType();
      
      if(in_array($device_Type, $devices)){
       
      }else{
        $devices[] = $device_Type;
      }
  
     
    }
  
    return $devices;

  }

  
  $deviceQuery = new PoctDeviceQuery();


  $result = $deviceQuery->find();
  
  $deviceconnectionTypes = [];

  foreach ($result as $device) {
    
    
    $device_Connection_Type= $device->getDeviceConnectionType();
    

    if(in_array($device_Connection_Type, $deviceconnectionTypes)){
     
    }else{
      $deviceconnectionTypes[] = $device_Connection_Type;
    }

   
  }

  return $deviceconnectionTypes;
}



function populateDeviceEnergyTypeDropdown()
{
  $deviceQuery = new PoctDeviceQuery();


  $result = $deviceQuery->find();
  
  $deviceEnergyTypes = [];

  foreach ($result as $device) {
    
   
   
    $device_Energy_Type= $device->getDeviceEnergyType();
   

    if(in_array($device_Energy_Type, $deviceEnergyTypes)){
      
    }else{
     $deviceEnergyTypes[] = $device_Energy_Type;
    }

   
  }
 
  return $deviceEnergyTypes;
}




function populateDeviceTypeDropdown()
{
  $deviceQuery = new PoctDeviceQuery();


  $result = $deviceQuery->find();
  
  $devices = [];

  foreach ($result as $device) {
      
          
    $device_Type= $device->getDeviceType();
    
    if(count($devices) >0 && isset($devices[$device_Type])){
     
    }else{
      $devices[] = $device_Type;
    }

   
  }

  /* foreach ($result as $device) {
    
    $temp = [];
    $temp["PoctDeviceId"] = $device->getPoctDeviceId();
    $device_Type= $device->getDeviceType();
    $temp["DeviceType"] = $device_Type;

    if(in_array($device_Type, $devices)){
     
    }else{
      $devices[] = $temp;
    }

   
  } */

  return $devices;
}


