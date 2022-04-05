<?php

use Propel\PoctDeviceAditionalInfoQuery;
use Propel\Runtime\ActiveQuery\Criteria;
//use Propel\UserQuery;

require $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";
require $_SERVER["DOCUMENT_ROOT"] . "/generated-conf/config.php";

function documentList()
{

    $documentQuery = PoctDeviceAditionalInfoQuery::create()
        ->join('PoctDeviceAditionalInfo.PoctDevice')
        ->withColumn('PoctDevice.PoctDeviceGenericName', 'Generic')
        ->where('PoctDeviceAditionalInfo.UserUserId = ?' , $_SESSION["user_id"])
        ->filterByUserUserId($_SESSION["user_id"])
        ->filterByPoctDeviceAditionalInfoType('USER_MANUAL')
        ->orderByPoctDeviceAditionalInfoId(Criteria::ASC)
        ->find();


    $documents = [];

    foreach ($documentQuery as $document) {
        $temp = [];
        $temp["AdditionalInfoID"] = $document->getPoctDeviceAditionalInfoId();
        $temp["DeviceID"] = $document->getIdpoctDevice();
        $temp["DeviceName"] = $document->getGeneric();
        $temp["WebContentLink"] = $document->getPoctDeviceAditionalInfoDetails();
        $temp["Label"] = $document->getPoctDeviceAditionalInfoLabel();

        $documents[] = $temp;
    }

    return $documents;
}
