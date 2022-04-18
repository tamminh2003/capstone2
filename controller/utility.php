<?php

namespace Utility;

use Propel\PoctDeviceQuery;
use Propel\PoctDeviceAditionalInfoQuery;

require $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";
require $_SERVER["DOCUMENT_ROOT"] . "/generated-conf/config.php";

function userAuthorization()
{
  if (!in_array($_SESSION['user_type'], AUTHORIZED_USER, false)) {
    $url = '/pages/Dashboard.php';
    header("Location:" . $url);
    exit();
  }
  return null;
}

function log($string)
{
  $output = "[" . date("D M d h:i:s Y", time()) . "] " . "$string\n";
  file_put_contents("php://stderr", $output);
}

function getDeviceById($deviceId)
{
  $query = PoctDeviceQuery::create()->findOneByPoctDeviceId($deviceId);
  if (!$query || $query == null) {
    log("Device not found.");
    exit();
  }

  $device = [];
  $device["device_id"] = $query->getPoctDeviceId();
  $device["user_user_id"] = $query->getUserUserId();
  $device["poct_device_manufacture_name"] = $query->getPoctDeviceManufactureName();
  $device["poct_device_generic_name"] = $query->getPoctDeviceGenericName();
  $device["device_model"] = $query->getDeviceModel();
  $device["device_type"] = $query->getDeviceType();
  $device["device_descripition"] = $query->getDeviceDescripition();

  return $device;
}

function getDocumentById($docId){
    /**fill with code for getting document by id**/
    $docQuery = PoctDeviceAditionalInfoQuery::create()
        ->join('PoctDeviceAditionalInfo.PoctDevice')
        ->withColumn('PoctDevice.PoctDeviceGenericName', 'Generic')
        ->withColumn('PoctDevice.DeviceModel', 'ModelCode')
        ->where('PoctDeviceAditionalInfo.UserUserId = ?' , $_SESSION["user_id"])
        ->filterByUserUserId($_SESSION["user_id"])
        ->filterByPoctDeviceAditionalInfoType('USER_MANUAL')
        ->findOneByPoctDeviceAditionalInfoId($docId);
    if (!$docQuery || $docQuery == null) {
        log("Document not found.");
        exit();
    }

    $document = [];
    $document["AdditionalInfoId"] = $docQuery->getPoctDeviceAditionalInfoId();
    $document["DeviceId"] = $docQuery->getIdpoctDevice();
    $document["DeviceModelCode"] = $docQuery->getModelCode();
    $document["DeviceGeneric"] = $docQuery->getGeneric();
    $document["Label"] = $docQuery->getPoctDeviceAditionalInfoLabel();
    $document["InfoType"] = $docQuery->getPoctDeviceAditionalInfoType();
    $document["WebContentLink"] = $docQuery->getPoctDeviceAditionalInfoDetails();
//    $document[""] = $docQuery->;

    return $document;
}
