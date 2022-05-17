<?php

use Propel\PoctDeviceQuery;
use Propel\Map\PoctDeviceTableMap;
use Propel\Disease;
use Propel\Map\DiseaseTableMap;
use Propel\PoctDevice;

use Propel\Runtime\Propel;
use Propel\Runtime\Formatter\ObjectFormatter;

require $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";
require $_SERVER["DOCUMENT_ROOT"] . "/generated-conf/config.php";

function search()
{
    $deviceQuery = new PoctDeviceQuery();


    $result = $deviceQuery->findByPoctDeviceGenericName('Anidra');


    $devices = [];

    foreach ($result as $device) {
        $temp = [];
        $temp["PoctDeviceId"] = $device->getPoctDeviceId();
        $temp["ManufactureName"] = $device->getPoctDeviceManufactureName();
        $temp["GenericName"] = $device->getPoctDeviceGenericName();
        $temp["DeviceModel"] = $device->getDeviceModel();
        $temp["DeviceType"] = $device->getDeviceType();
        $temp["DeviceDescription"] = $device->getDeviceDescripition();


        $devices[] = $temp;
    }

    return $devices;
}

function freeTextSearch($free_text_search)
{

  $devices = [];
  $devicesset = [];
  $con = Propel::getWriteConnection(PoctDeviceTableMap::DATABASE_NAME);
  $query =  "SELECT * FROM poct_device WHERE poct_device_id LIKE '%" . $free_text_search . "%' OR  poct_device_id IN "
    . "(SELECT poct_device_id FROM poct_device_has_disease WHERE disease_id IN "
    . "(SELECT disease_id FROM disease WHERE disease_name LIKE '%" . $free_text_search . "%' OR disease_api_key LIKE '%" . $free_text_search . "%'))"
    . "OR poct_device_manufacture_name LIKE '%" . $free_text_search . "%'"
    . "OR poct_device_energy_type LIKE '%" . $free_text_search . "%'"
    . "OR poct_device_connection_type LIKE '%" . $free_text_search . "%'"
    . "OR poct_device_generic_name LIKE '%" . $free_text_search . "%'"
    . "OR device_type LIKE '%" . $free_text_search . "%'"
    . "OR device_model LIKE '%" . $free_text_search . "%'"
    . "OR user_user_id IN (SELECT user_id FROM user WHERE user_company LIKE '%" . $free_text_search . "%')";

    $stmt = $con->prepare($query);
    if ($stmt->execute()) {
        $devicesset = $stmt->fetchAll();
    }

  
  
  foreach ($devicesset as $device) {

    $temp = [];
    $temp["PoctDeviceId"] = $device['poct_device_id'];
    $temp["ManufactureName"] = $device['poct_device_manufacture_name'];
    $temp["DeviceImgUrl"] = $device['device_image_url'];
    $temp["GenericName"] = $device['poct_device_generic_name'];
    $temp["DeviceModel"] = $device['device_model'];
    $temp["DeviceType"] = $device['device_type'];
    $temp["DeviceDescription"] = $device['device_descripition'];


        $devices[] = $temp;
    }

    return $devices;
}

function advancedSearch($advanced_text_search)
{

  $devices = [];
  $devicesset = [];
  $con = Propel::getWriteConnection(PoctDeviceTableMap::DATABASE_NAME);
  $query =  "SELECT * FROM poct_device WHERE poct_device_id LIKE '%" . $advanced_text_search . "%' OR poct_device_id IN "
    . "(SELECT poct_device_id FROM poct_device_has_disease WHERE disease_id IN "
    . "(SELECT disease_id FROM disease WHERE disease_name LIKE '%" . $advanced_text_search . "%' OR disease_api_key LIKE '%" . $advanced_text_search . "%'))"
    . "OR poct_device_manufacture_name LIKE '%" . $advanced_text_search . "%'"
    . "OR poct_device_generic_name LIKE '%" . $advanced_text_search . "%'"
    . "OR poct_device_energy_type LIKE '%" . $advanced_text_search . "%'"
    . "OR poct_device_connection_type LIKE '%" . $advanced_text_search . "%'"
    . "OR device_type LIKE '%" . $advanced_text_search . "%'"
    . "OR device_model LIKE '%" . $advanced_text_search . "%'"
    . "OR user_user_id IN (SELECT user_id FROM user WHERE user_company LIKE '%" . $advanced_text_search . "%')";

    $stmt = $con->prepare($query);
    if ($stmt->execute()) {
        $devicesset = $stmt->fetchAll();
    }


    foreach ($devicesset as $device) {

    $temp = [];
    $temp["PoctDeviceId"] = $device['poct_device_id'];
    $temp["ManufactureName"] = $device['poct_device_manufacture_name'];
    $temp["GenericName"] = $device['poct_device_generic_name'];
    $temp["DeviceImgUrl"] = $device['device_image_url'];
    $temp["DeviceModel"] = $device['device_model'];
    $temp["DeviceType"] = $device['device_type'];
    $temp["DeviceDescription"] = $device['device_descripition'];


        $devices[] = $temp;
    }

    return $devices;
}

function advancedSearch2($advanced_text_search,$manufacturerId,$deviceType,$icd11Code,$connectionType,$energyType){
  var_dump("teststring",$advanced_text_search,$manufacturerId,$deviceType,$icd11Code);
  $devices = [];
  $devicesset = [];
  $con = Propel::getWriteConnection(PoctDeviceTableMap::DATABASE_NAME);

  if ($advanced_text_search!=null && $manufacturerId !=null && $deviceType != null && $icd11Code != null) {
    $query =  "SELECT * FROM poct_device WHERE poct_device_id LIKE '%" . $advanced_text_search . "%' OR poct_device_id IN "
    . "(SELECT poct_device_id FROM poct_device_has_disease WHERE disease_id IN "
    . "(SELECT disease_id FROM disease WHERE disease_name LIKE '%" . $advanced_text_search . "%' OR disease_api_key LIKE '%" . $advanced_text_search . "%'))"
    . "OR poct_device_manufacture_name LIKE '%" . $advanced_text_search . "%'"
    . "OR poct_device_generic_name LIKE '%" . $advanced_text_search . "%'"
    . "OR poct_device_energy_type LIKE '%" . $advanced_text_search . "%'"
    . "OR poct_device_connection_type LIKE '%" . $advanced_text_search . "%'"
    . "AND device_type LIKE '%" . $advanced_text_search . "%'"
    . "OR device_model LIKE '%" . $advanced_text_search . "%'"
    . "AND user_user_id = $manufacturerId";

  } else if ($advanced_text_search == null && $manufacturerId !=null && $deviceType != null && $icd11Code != null) {
   
    $query =  "SELECT * FROM poct_device WHERE poct_device_id LIKE '%" . $advanced_text_search . "%' OR poct_device_id IN "
    . "(SELECT poct_device_id FROM poct_device_has_disease WHERE disease_id IN "
    . "(SELECT disease_id FROM disease WHERE disease_name LIKE '%" . $advanced_text_search . "%' OR disease_api_key LIKE '%" . $advanced_text_search . "%'))"
    . "OR poct_device_manufacture_name LIKE '%" . $advanced_text_search . "%'"
    . "OR poct_device_generic_name LIKE '%" . $advanced_text_search . "%'"
    . "OR device_type LIKE '%" . $advanced_text_search . "%'"
    . "OR device_model LIKE '%" . $advanced_text_search . "%'"
    . "OR user_user_id IN (SELECT user_id FROM user WHERE user_company LIKE '%" . $advanced_text_search . "%')";

  }else if ($advanced_text_search == null && $manufacturerId ==null && $deviceType != null && $icd11Code != null) {
   
    $query =  "SELECT * FROM poct_device WHERE poct_device_id LIKE '%" . $advanced_text_search . "%' OR poct_device_id IN "
    . "(SELECT poct_device_id FROM poct_device_has_disease WHERE disease_id IN "
    . "(SELECT disease_id FROM disease WHERE disease_name LIKE '%" . $advanced_text_search . "%' OR disease_api_key LIKE '%" . $advanced_text_search . "%'))"
    . "OR poct_device_manufacture_name LIKE '%" . $advanced_text_search . "%'"
    . "OR poct_device_generic_name LIKE '%" . $advanced_text_search . "%'"
    . "OR device_type LIKE '%" . $advanced_text_search . "%'"
    . "OR device_model LIKE '%" . $advanced_text_search . "%'"
    . "OR user_user_id IN (SELECT user_id FROM user WHERE user_company LIKE '%" . $advanced_text_search . "%')";

  }else if ($advanced_text_search == null && $manufacturerId ==null && $deviceType == null && $icd11Code != null) {
   
    $query =  "SELECT * FROM poct_device WHERE poct_device_id LIKE '%" . $advanced_text_search . "%' OR poct_device_id IN "
    . "(SELECT poct_device_id FROM poct_device_has_disease WHERE disease_id IN "
    . "(SELECT disease_id FROM disease WHERE disease_name LIKE '%" . $advanced_text_search . "%' OR disease_api_key LIKE '%" . $advanced_text_search . "%'))"
    . "OR poct_device_manufacture_name LIKE '%" . $advanced_text_search . "%'"
    . "OR poct_device_generic_name LIKE '%" . $advanced_text_search . "%'"
    . "OR device_type LIKE '%" . $advanced_text_search . "%'"
    . "OR device_model LIKE '%" . $advanced_text_search . "%'"
    . "OR user_user_id IN (SELECT user_id FROM user WHERE user_company LIKE '%" . $advanced_text_search . "%')";

  }else if ($advanced_text_search == null && $manufacturerId !=null && $deviceType != null && $icd11Code == null) {
   
    $query =  "SELECT * FROM poct_device WHERE poct_device_id LIKE '%" . $advanced_text_search . "%' OR poct_device_id IN "
    . "(SELECT poct_device_id FROM poct_device_has_disease WHERE disease_id IN "
    . "(SELECT disease_id FROM disease WHERE disease_name LIKE '%" . $advanced_text_search . "%' OR disease_api_key LIKE '%" . $advanced_text_search . "%'))"
    . "OR poct_device_manufacture_name LIKE '%" . $advanced_text_search . "%'"
    . "OR poct_device_generic_name LIKE '%" . $advanced_text_search . "%'"
    . "OR device_type LIKE '%" . $advanced_text_search . "%'"
    . "OR device_model LIKE '%" . $advanced_text_search . "%'"
    . "OR user_user_id IN (SELECT user_id FROM user WHERE user_company LIKE '%" . $advanced_text_search . "%')";

  }else if ($advanced_text_search == null && $manufacturerId !=null && $deviceType == null && $icd11Code == null) {
   
    $query =  "SELECT * FROM poct_device WHERE poct_device_id LIKE '%" . $advanced_text_search . "%' OR poct_device_id IN "
    . "(SELECT poct_device_id FROM poct_device_has_disease WHERE disease_id IN "
    . "(SELECT disease_id FROM disease WHERE disease_name LIKE '%" . $advanced_text_search . "%' OR disease_api_key LIKE '%" . $advanced_text_search . "%'))"
    . "OR poct_device_manufacture_name LIKE '%" . $advanced_text_search . "%'"
    . "OR poct_device_generic_name LIKE '%" . $advanced_text_search . "%'"
    . "OR device_type LIKE '%" . $advanced_text_search . "%'"
    . "OR device_model LIKE '%" . $advanced_text_search . "%'"
    . "OR user_user_id IN (SELECT user_id FROM user WHERE user_company LIKE '%" . $advanced_text_search . "%')";

  }else if ($advanced_text_search == null && $manufacturerId !=null && $deviceType == null && $icd11Code != null) {
   
    $query =  "SELECT * FROM poct_device WHERE poct_device_id LIKE '%" . $advanced_text_search . "%' OR poct_device_id IN "
    . "(SELECT poct_device_id FROM poct_device_has_disease WHERE disease_id IN "
    . "(SELECT disease_id FROM disease WHERE disease_name LIKE '%" . $advanced_text_search . "%' OR disease_api_key LIKE '%" . $advanced_text_search . "%'))"
    . "OR poct_device_manufacture_name LIKE '%" . $advanced_text_search . "%'"
    . "OR poct_device_generic_name LIKE '%" . $advanced_text_search . "%'"
    . "OR device_type LIKE '%" . $advanced_text_search . "%'"
    . "OR device_model LIKE '%" . $advanced_text_search . "%'"
    . "OR user_user_id IN (SELECT user_id FROM user WHERE user_company LIKE '%" . $advanced_text_search . "%')";

  }else if ($advanced_text_search == null && $manufacturerId !=null && $deviceType == null && $icd11Code == null) {
   
    $query =  "SELECT * FROM poct_device WHERE poct_device_id LIKE '%" . $advanced_text_search . "%' OR poct_device_id IN "
    . "(SELECT poct_device_id FROM poct_device_has_disease WHERE disease_id IN "
    . "(SELECT disease_id FROM disease WHERE disease_name LIKE '%" . $advanced_text_search . "%' OR disease_api_key LIKE '%" . $advanced_text_search . "%'))"
    . "OR poct_device_manufacture_name LIKE '%" . $advanced_text_search . "%'"
    . "OR poct_device_generic_name LIKE '%" . $advanced_text_search . "%'"
    . "OR device_type LIKE '%" . $advanced_text_search . "%'"
    . "OR device_model LIKE '%" . $advanced_text_search . "%'"
    . "OR user_user_id IN (SELECT user_id FROM user WHERE user_company LIKE '%" . $advanced_text_search . "%')";

  }else if ($advanced_text_search == null && $manufacturerId ==null && $deviceType != null && $icd11Code == null) {
   
    $query =  "SELECT * FROM poct_device WHERE poct_device_id LIKE '%" . $advanced_text_search . "%' OR poct_device_id IN "
    . "(SELECT poct_device_id FROM poct_device_has_disease WHERE disease_id IN "
    . "(SELECT disease_id FROM disease WHERE disease_name LIKE '%" . $advanced_text_search . "%' OR disease_api_key LIKE '%" . $advanced_text_search . "%'))"
    . "OR poct_device_manufacture_name LIKE '%" . $advanced_text_search . "%'"
    . "OR poct_device_generic_name LIKE '%" . $advanced_text_search . "%'"
    . "OR device_type LIKE '%" . $advanced_text_search . "%'"
    . "OR device_model LIKE '%" . $advanced_text_search . "%'"
    . "OR user_user_id IN (SELECT user_id FROM user WHERE user_company LIKE '%" . $advanced_text_search . "%')";

  }else if ($advanced_text_search != null && $manufacturerId !=null && $deviceType != null && $icd11Code == null) {
   
    $query =  "SELECT * FROM poct_device WHERE poct_device_id LIKE '%" . $advanced_text_search . "%' OR poct_device_id IN "
    . "(SELECT poct_device_id FROM poct_device_has_disease WHERE disease_id IN "
    . "(SELECT disease_id FROM disease WHERE disease_name LIKE '%" . $advanced_text_search . "%' OR disease_api_key LIKE '%" . $advanced_text_search . "%'))"
    . "OR poct_device_manufacture_name LIKE '%" . $advanced_text_search . "%'"
    . "OR poct_device_generic_name LIKE '%" . $advanced_text_search . "%'"
    . "OR device_type LIKE '%" . $advanced_text_search . "%'"
    . "OR device_model LIKE '%" . $advanced_text_search . "%'"
    . "OR user_user_id IN (SELECT user_id FROM user WHERE user_company LIKE '%" . $advanced_text_search . "%')";

  }else if ($advanced_text_search != null && $manufacturerId ==null && $deviceType != null && $icd11Code != null) {
   
    $query =  "SELECT * FROM poct_device WHERE poct_device_id LIKE '%" . $advanced_text_search . "%' OR poct_device_id IN "
    . "(SELECT poct_device_id FROM poct_device_has_disease WHERE disease_id IN "
    . "(SELECT disease_id FROM disease WHERE disease_name LIKE '%" . $advanced_text_search . "%' OR disease_api_key LIKE '%" . $advanced_text_search . "%'))"
    . "OR poct_device_manufacture_name LIKE '%" . $advanced_text_search . "%'"
    . "OR poct_device_generic_name LIKE '%" . $advanced_text_search . "%'"
    . "OR device_type LIKE '%" . $advanced_text_search . "%'"
    . "OR device_model LIKE '%" . $advanced_text_search . "%'"
    . "OR user_user_id IN (SELECT user_id FROM user WHERE user_company LIKE '%" . $advanced_text_search . "%')";

  }else if ($advanced_text_search != null && $manufacturerId !=null && $deviceType == null && $icd11Code != null) {
   
    $query =  "SELECT * FROM poct_device WHERE poct_device_id LIKE '%" . $advanced_text_search . "%' OR poct_device_id IN "
    . "(SELECT poct_device_id FROM poct_device_has_disease WHERE disease_id IN "
    . "(SELECT disease_id FROM disease WHERE disease_name LIKE '%" . $advanced_text_search . "%' OR disease_api_key LIKE '%" . $advanced_text_search . "%'))"
    . "OR poct_device_manufacture_name LIKE '%" . $advanced_text_search . "%'"
    . "OR poct_device_generic_name LIKE '%" . $advanced_text_search . "%'"
    . "OR device_type LIKE '%" . $advanced_text_search . "%'"
    . "OR device_model LIKE '%" . $advanced_text_search . "%'"
    . "OR user_user_id IN (SELECT user_id FROM user WHERE user_company LIKE '%" . $advanced_text_search . "%')";

  }else if ($advanced_text_search != null && $manufacturerId !=null && $deviceType == null && $icd11Code == null) {
   
    $query =  "SELECT * FROM poct_device WHERE poct_device_id LIKE '%" . $advanced_text_search . "%' OR poct_device_id IN "
    . "(SELECT poct_device_id FROM poct_device_has_disease WHERE disease_id IN "
    . "(SELECT disease_id FROM disease WHERE disease_name LIKE '%" . $advanced_text_search . "%' OR disease_api_key LIKE '%" . $advanced_text_search . "%'))"
    . "OR poct_device_manufacture_name LIKE '%" . $advanced_text_search . "%'"
    . "OR poct_device_generic_name LIKE '%" . $advanced_text_search . "%'"
    . "OR device_type LIKE '%" . $advanced_text_search . "%'"
    . "OR device_model LIKE '%" . $advanced_text_search . "%'"
    . "OR user_user_id IN (SELECT user_id FROM user WHERE user_company LIKE '%" . $advanced_text_search . "%')";

  }else if ($advanced_text_search != null && $manufacturerId ==null && $deviceType != null && $icd11Code == null) {
   
    $query =  "SELECT * FROM poct_device WHERE poct_device_id LIKE '%" . $advanced_text_search . "%' OR poct_device_id IN "
    . "(SELECT poct_device_id FROM poct_device_has_disease WHERE disease_id IN "
    . "(SELECT disease_id FROM disease WHERE disease_name LIKE '%" . $advanced_text_search . "%' OR disease_api_key LIKE '%" . $advanced_text_search . "%'))"
    . "OR poct_device_manufacture_name LIKE '%" . $advanced_text_search . "%'"
    . "OR poct_device_generic_name LIKE '%" . $advanced_text_search . "%'"
    . "OR device_type LIKE '%" . $advanced_text_search . "%'"
    . "OR device_model LIKE '%" . $advanced_text_search . "%'"
    . "OR user_user_id IN (SELECT user_id FROM user WHERE user_company LIKE '%" . $advanced_text_search . "%')";

  }else if ($advanced_text_search != null && $manufacturerId ==null && $deviceType == null && $icd11Code != null) {
   
    $query =  "SELECT * FROM poct_device WHERE poct_device_id LIKE '%" . $advanced_text_search . "%' OR poct_device_id IN "
    . "(SELECT poct_device_id FROM poct_device_has_disease WHERE disease_id IN "
    . "(SELECT disease_id FROM disease WHERE disease_name LIKE '%" . $advanced_text_search . "%' OR disease_api_key LIKE '%" . $advanced_text_search . "%'))"
    . "OR poct_device_manufacture_name LIKE '%" . $advanced_text_search . "%'"
    . "OR poct_device_generic_name LIKE '%" . $advanced_text_search . "%'"
    . "OR poct_device_energy_type LIKE '%" . $advanced_text_search . "%'"
    . "OR poct_device_connection_type LIKE '%" . $advanced_text_search . "%'"
    . "OR device_type LIKE '%" . $advanced_text_search . "%'"
    . "OR device_model LIKE '%" . $advanced_text_search . "%'"
    . "OR user_user_id IN (SELECT user_id FROM user WHERE user_company LIKE '%" . $advanced_text_search . "%')";

  }else {
   
    $query =  "SELECT * FROM poct_device WHERE poct_device_id LIKE '%" . $advanced_text_search . "%' OR poct_device_id IN "
    . "(SELECT poct_device_id FROM poct_device_has_disease WHERE disease_id IN "
    . "(SELECT disease_id FROM disease WHERE disease_name LIKE '%" . $advanced_text_search . "%' OR disease_api_key LIKE '%" . $advanced_text_search . "%'))"
    . "OR poct_device_manufacture_name LIKE '%" . $advanced_text_search . "%'"
    . "OR poct_device_generic_name LIKE '%" . $advanced_text_search . "%'"
    . "OR poct_device_energy_type LIKE '%" . $advanced_text_search . "%'"
    . "OR poct_device_connection_type LIKE '%" . $advanced_text_search . "%'"
    . "OR device_type LIKE '%" . $advanced_text_search . "%'"
    . "OR device_model LIKE '%" . $advanced_text_search . "%'"
    . "OR user_user_id IN (SELECT user_id FROM user WHERE user_company LIKE '%" . $advanced_text_search . "%')";

  }
  
  
  $stmt = $con->prepare($query);
  if ($stmt->execute()) {
    $devicesset = $stmt->fetchAll();
  }

  foreach ($devicesset as $device) {

    $temp = [];
    $temp["PoctDeviceId"] = $device['poct_device_id'];
    $temp["ManufactureName"] = $device['poct_device_manufacture_name'];
    $temp["GenericName"] = $device['poct_device_generic_name'];
    $temp["DeviceImgUrl"] = $device['device_image_url'];
    $temp["DeviceModel"] = $device['device_model'];
    $temp["DeviceType"] = $device['device_type'];
    $temp["DeviceDescription"] = $device['device_descripition'];


    $devices[] = $temp;
  }

  return $devices;

}



