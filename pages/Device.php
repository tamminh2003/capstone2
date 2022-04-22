<?php
if (!isset($_SESSION)) session_start();

use buzzingpixel\twigswitch\SwitchTwigExtension;
use Propel\PoctDeviceQuery;
use Umpirsky\Twig\Extension\PhpFunctionExtension;

require_once $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/controller/search.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/controller/utility.php";

if (!isset($_GET['device_id'])) {
  Utility\log('$_GET["device_id"] not found');
  exit();
}

$device = PoctDeviceQuery::create()->findOneByPoctDeviceId($_GET["device_id"]);

$passingVariable = [
  "PoctDeviceId" => $device->getPoctDeviceId(),
  "PoctDeviceManufactureName" => $device->getPoctDeviceManufactureName(),
  "PoctDeviceGenericName" => $device->getPoctDeviceGenericName(),
  "DeviceImageUrl" => $device->getDeviceImageUrl(),
  "DeviceModel" => $device->getDeviceModel(),
  "DeviceType" => $device->getDeviceType(),
  "DeviceDescripition" => $device->getDeviceDescripition()
];

$pathToPages = $_SERVER["DOCUMENT_ROOT"] . "/pages/";
$twigLoader = new \Twig\Loader\FilesystemLoader($pathToPages);
$twig = new Twig\Environment($twigLoader);
$twig->addExtension(new PhpFunctionExtension(["str_contains"]));
$twig->addExtension(new SwitchTwigExtension());
$template = $twig->load("Device.twig");

echo $template->render(["uri" => $_SERVER["REQUEST_URI"], "session" => $_SESSION, "device" => $passingVariable]);
