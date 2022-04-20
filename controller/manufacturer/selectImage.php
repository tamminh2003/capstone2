<?php

/**
 * This is a api-access controller.
 * Other way of accessing this file will be redirect back to DeviceList.php
 */

/**
 * Exit conditions to check if the controller is not accessed by php page
 */
if (!isset($_SESSION)) session_start();
defined("AUTHORIZED_USER") or define("AUTHORIZED_USER", array("MANUFACTURER"));

use Propel\PoctDeviceAditionalInfoQuery as ImageQuery;
use Propel\PoctDeviceQuery as DeviceQuery;

require_once $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/generated-conf/config.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/controller/utility.php";

/**
 * Manufacturer Authorization
 */
if (Utility\userAuthorization($_SESSION["user_type"], AUTHORIZED_USER, false)) {;
  
  $fileId = ImageQuery::create()->findOneByPoctDeviceAditionalInfoId($_POST["imageId"])->getPoctDeviceAditionalInfoDetails();

  $client = Utility\getGoogleClient();
  $service = new Google\Service\Drive($client);
  $image = $service->files->get($fileId, ["fields" => "webContentLink"]);
  $uri = str_replace("download", "view", $image->getWebContentLink());

  $device = DeviceQuery::create()->findOneByPoctDeviceId($_POST["deviceId"]);
  $device->setDeviceImageUrl($uri);
  $device->save();

  echo "success";
}
