<?php

namespace Utility;

use Propel\PoctDeviceQuery;

require $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";
require $_SERVER["DOCUMENT_ROOT"] . "/generated-conf/config.php";

function userAuthorization()
{
  if (!in_array($_SESSION['user_type'], AUTHORIZED_USER, false)) {
    $url = $_SERVER['HTTP_HOST'] . '/pages/Dashboard.php';
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
  $device["user_user_id"] = $query->getUserUserId();
  $device["poct_device_manufacture_name"] = $query->getPoctDeviceManufactureName();
  $device["poct_device_generic_name"] = $query->getPoctDeviceGenericName();
  $device["device_model"] = $query->getDeviceModel();
  $device["device_type"] = $query->getDeviceType();
  $device["device_descripition"] = $query->getDeviceDescripition();

  return $device;
}
