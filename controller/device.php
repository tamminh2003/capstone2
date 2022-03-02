<?php
use Propel\PoctDevice;
use Propel\PoctDeviceQuery;
use Propel\Users;
use Propel\UsersQuery;

require $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";
require $_SERVER["DOCUMENT_ROOT"] . "/generated-conf/config.php";

class DeviceController
{
	public function __construct()
	{
	}
  /**
   * @* @param mixed $data a
   */
	public function add($data)
	{
		[
			"deviceName" => $deviceName,
			"deviceModel" => $deviceModel,
			"deviceImgUrl" => $deviceImgUrl,
			"deviceType" => $deviceType,
		] = $_POST;

		$device = new PoctDevice();
		$device->setPoctDeviceGenericName($_POST['deviceName']);
    $device->setDeviceModel($_POST['deviceModel']);
    $device->setDeviceImageUrl($_POST['deviceImgUrl']);
    $device->setDeviceType($_POST['deviceType']);
    $device->save();

	}
}
