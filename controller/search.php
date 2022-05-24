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

function advancedSearch2( $advanced_text_search, $manufacturer, $deviceType, $icd11Code, $deviceConnectionType, $devicEenergyType){
  $devices = [];
  $devicesset = [];
  $con = Propel::getWriteConnection(PoctDeviceTableMap::DATABASE_NAME);

 
  $createview = "CREATE VIEW DeviceDiseaseMergedSummaryView AS " 
  ."SELECT poct_device_has_disease.poct_device_id , disease.disease_id, disease.disease_api_key, disease.disease_name "
  ."FROM poct_device_has_disease LEFT JOIN disease ON poct_device_has_disease.disease_id = disease.disease_id; "
  ."CREATE VIEW DeviceSearchView AS " 
  ."SELECT poct_device.poct_device_id, poct_device.poct_device_manufacture_name, poct_device.poct_device_generic_name, " 
  ."poct_device.device_model, poct_device.device_image_url, poct_device.device_type, poct_device.device_descripition, "
  ."poct_device.poct_device_connection_type, poct_device.poct_device_energy_type, user.user_company, user.user_id "
  ."FROM poct_device LEFT JOIN user ON poct_device.user_user_id=user.user_id; "
  ."CREATE VIEW SearchView AS SELECT DeviceSearchView.poct_device_id, DeviceSearchView.poct_device_manufacture_name, DeviceSearchView.poct_device_generic_name, " 
  ."DeviceSearchView.device_model, DeviceSearchView.device_image_url, DeviceSearchView.device_type, DeviceSearchView.device_descripition, "
  ."DeviceSearchView.poct_device_connection_type, DeviceSearchView.poct_device_energy_type, DeviceSearchView.user_company, DeviceSearchView.user_id, DeviceDiseaseMergedSummaryView.disease_id, DeviceDiseaseMergedSummaryView.disease_api_key, DeviceDiseaseMergedSummaryView.disease_name  "
  ."FROM DeviceSearchView LEFT JOIN DeviceDiseaseMergedSummaryView ON DeviceSearchView.poct_device_id = DeviceDiseaseMergedSummaryView.poct_device_id; ";

$stmtview = $con->prepare($createview);
try {

$stmtview->execute();

}catch (\Throwable $th) {

}

$stmtview->closeCursor();


$queryStarterString = "SELECT * FROM SearchView ";
if($advanced_text_search!=null || $manufacturer !=null || $deviceType != null || $icd11Code != null || $deviceConnectionType!=null || $devicEenergyType != null){
  $querycCombinatorStart = "WHERE (";
  $querycCombinatorEnd = " ) ORDER BY poct_device_id";

}

$queryAdvancedSearchString = "";
$queryManufacturerString= "";
$queryDeviceTypeString= "";
$queryICD11CodeString= "";
$queryDeviceConnectionTypeString= "";
$queryDeviceEnergyTypeString= "";

if ($advanced_text_search!=null) {
  $queryAdvancedSearchString = "(poct_device_id LIKE '%" . $advanced_text_search . "%' "
  . "OR poct_device_manufacture_name LIKE '%" . $advanced_text_search . "%' "
  . "OR poct_device_generic_name LIKE '%" . $advanced_text_search . "%' "
  . "OR device_model LIKE '%" . $advanced_text_search . "%') ";
} else {
  $queryAdvancedSearchString="";
}

if ($manufacturer!=null && $advanced_text_search==="") {
  $queryManufacturerString = " user_company = '" . $manufacturer . "' ";
}
else if ($manufacturer!=null && $advanced_text_search!=null) {
  $queryManufacturerString = "AND user_company = '" . $manufacturer . "' ";
} 

if ($deviceType!=null && $advanced_text_search === "" && $manufacturer==="") {
  $queryDeviceTypeString = " device_type = '" . $deviceType . "' ";
}
else if ($deviceType!=null && $advanced_text_search!=null) {
  $queryDeviceTypeString = "AND device_type = '" . $deviceType . "' ";
}


if ($icd11Code!=null && $advanced_text_search ==="" && $manufacturer==="" && $deviceType ==="") {
  $queryICD11CodeString = " disease_api_key = '" . $icd11Code . "' ";
}
else if ($icd11Code!=null && $advanced_text_search!=null) {
  $queryICD11CodeString = "AND disease_api_key = '" . $icd11Code . "' ";
} 



if ($deviceConnectionType!=null && $advanced_text_search ==="" && $manufacturer ==="" && $deviceType ==="" && $icd11Code ==="") {
  $queryDeviceConnectionTypeString = " poct_device_connection_type = '" . $deviceConnectionType . "' ";
}
else if ($deviceConnectionType!=null && $advanced_text_search!=null) {
  $queryDeviceConnectionTypeString = "AND poct_device_connection_type = '" . $deviceConnectionType . "' ";
}



if ($devicEenergyType!=null && $advanced_text_search ==="" && $manufacturer ==="" && $deviceType ==="" && $icd11Code === "" && $deviceConnectionType==="") {
  $queryDeviceEnergyTypeString = " poct_device_energy_type = '" . $devicEenergyType . "' ";
}
else if ($devicEenergyType!=null && $advanced_text_search!=null) {
  $queryDeviceEnergyTypeString = "AND poct_device_energy_type = '" . $devicEenergyType . "' ";
} 

if ( $advanced_text_search != null|| $manufacturer != null || $deviceType != null || $icd11Code != null || $deviceConnectionType!= null || $devicEenergyType!=null) {
  $fullSearchQuery = $queryStarterString. $querycCombinatorStart. $queryAdvancedSearchString .$queryManufacturerString. $queryDeviceTypeString. $queryICD11CodeString. $queryDeviceConnectionTypeString. $queryDeviceEnergyTypeString. $querycCombinatorEnd;

} else{
  $fullSearchQuery = $queryStarterString;
  
}  
  
  $stmt = $con->prepare($fullSearchQuery);
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
    
    $temp["DeviceConnectionType"] = $device['poct_device_connection_type'];
    $temp["DeviceEnergyType"] = $device['poct_device_energy_type'];
    $temp["UserCompany"] = $device['user_company'];
    $temp["UserId"] = $device['user_id'];
    $temp["DiseaseName"] = $device['disease_name'];
    $temp["DiseaseAPICode"] = $device['disease_api_key'];
    $temp["DiseaseCode"] = $device['disease_id'];


    $devices[] = $temp;
  }

  $stmt->closeCursor();
  
$viewdropQuery = " Drop view DeviceDiseaseMergedSummaryView, DeviceSearchView, SearchView;";
$stmtviewdrop = $con->prepare($viewdropQuery);

  try {
    $stmtviewdrop->execute();
  } catch (\Throwable $th) {
  
  }
  $stmtviewdrop->closeCursor();
return $devices;
}



