<?php

/**
 * This is a page-access controller.
 * Other way of accessing this file will be redirect back to DeviceList.php
 */

/**
 * Exit conditions to check if the controller is not accessed by php page
 */
if (!isset($_SESSION)) session_start();
if (!defined("AUTHORIZED_USER")) {
    header("Location: /pages/Manufacturer/DeviceList.php");
};

use Propel\PoctDeviceAditionalInfoQuery as ImageQuery;
use Propel\Runtime\ActiveQuery\Criteria;

require_once $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/generated-conf/config.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/controller/utility.php";

/**
 * Manufacturer Authorization
 */
if (Utility\userAuthorization($_SESSION["user_type"], AUTHORIZED_USER, false)) {;

    function imageList($deviceId)
    {

        $client = Utility\getGoogleClient();
        $service = new Google\Service\Drive($client);

        $imageQuery = ImageQuery::create()
            ->filterByUserUserId($_SESSION["user_id"])
            ->filterByIdpoctDevice($deviceId)
            ->filterByPoctDeviceAditionalInfoType("image")
            ->orderByPoctDeviceAditionalInfoId(Criteria::ASC)
            ->find();

        $images = [];

        foreach ($imageQuery as $image) {
            $temp = [];
            $temp["id"] = $image->getPoctDeviceAditionalInfoId();
            $temp["fileId"] = $image->getPoctDeviceAditionalInfoDetails();
            $temp["label"] = $image->getPoctDeviceAditionalInfoLabel();
            $optParams = array("fields" => "webContentLink, webViewLink");
            $file = $service->files->get($temp["fileId"], $optParams);
            $temp["link"] = $file->getWebContentLink(); // Performance issue as this call is within a loop
            $temp["view"] = str_replace("download", "view", $temp["link"]);
            $images[] = $temp;
        }

        return $images;
    }
}
