<?php

/**
 * This is a page-access controller.
 * Other way of accessing this file will be redirect back to DeviceList.php
 */

/**
 * Exit conditions to check if the controller is not accessed by php page
 */
if (!isset($_SESSION)) session_start();

use Propel\PoctDeviceAditionalInfoQuery as DocumentQuery;
use Propel\Runtime\ActiveQuery\Criteria;

require_once $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/generated-conf/config.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/controller/utility.php";

    function documentList($deviceId)
    {

        $client = Utility\getGoogleClient();
        $service = new Google\Service\Drive($client);

        $documentQuery = DocumentQuery::create()
            ->filterByIdpoctDevice($deviceId)
            ->filterByPoctDeviceAditionalInfoType("document")
            ->orderByPoctDeviceAditionalInfoId(Criteria::ASC)
            ->find();

        $documents = [];

        foreach ($documentQuery as $document) {
            $temp = [];
            $temp["user_user_id"] = $document->getUserUserId();
            $temp["id"] = $document->getPoctDeviceAditionalInfoId();
            $temp["fileId"] = $document->getPoctDeviceAditionalInfoDetails();
            $temp["label"] = $document->getPoctDeviceAditionalInfoLabel();
            $optParams = array("fields" => "webContentLink");
            $file = $service->files->get($temp["fileId"], $optParams);
            $temp["link"] = $file->getWebContentLink(); // Performance issue as this call is within a loop
            $documents[] = $temp;
        }

        return $documents;
    }
