<?php
session_start();
const AUTHORIZED_USER = ["MANUFACTURER"];

use Propel\PoctDeviceAditionalInfoQuery;
use Propel\Runtime\ActiveQuery\Criteria;
//use Propel\UserQuery;

require_once $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/generated-conf/config.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/controller/utility.php";

Utility\userAuthorization($_SESSION["user_type"], AUTHORIZED_USER, false);

function documentList($deviceId)
{

    // $documentQuery = PoctDeviceAditionalInfoQuery::create()
    //     ->join('PoctDeviceAditionalInfo.PoctDevice')
    //     ->withColumn('PoctDevice.PoctDeviceGenericName', 'Generic')
    //     ->where('PoctDeviceAditionalInfo.UserUserId = ?', $_SESSION["user_id"])
    //     ->filterByUserUserId($_SESSION["user_id"])
    //     ->filterByPoctDeviceAditionalInfoType('USER_MANUAL')
    //     ->orderByPoctDeviceAditionalInfoId(Criteria::ASC)
    //     ->find();

    $client = Utility\getGoogleClient();
    $service = new Google\Service\Drive($client);

    $documentQuery = PoctDeviceAditionalInfoQuery::create()
        ->filterByUserUserId($_SESSION["user_id"])
        ->filterByIdpoctDevice($deviceId)
        ->orderByPoctDeviceAditionalInfoId(Criteria::ASC)
        ->find();

    $documents = [];

    foreach ($documentQuery as $document) {
        $temp = [];
        $temp["fileId"] = $document->getPoctDeviceAditionalInfoDetails();
        $temp["label"] = $document->getPoctDeviceAditionalInfoLabel();

        $documents[] = $temp;
    }

    return $documents;
}
