<?php
session_start();

use buzzingpixel\twigswitch\SwitchTwigExtension;
use Umpirsky\Twig\Extension\PhpFunctionExtension;

require $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";
require $_SERVER["DOCUMENT_ROOT"] . "/controller/utility.php";
require $_SERVER["DOCUMENT_ROOT"] . "/controller/documentList.php";

const AUTHORIZED_USER = ['MANUFACTURER'];

Utility\userAuthorization();
/**
 * Check whether the device is belonged to this manufacturer
 */
$device_id = $_GET["device_id"];
$device = Utility\getDeviceById($device_id);
if ($device["user_user_id"] != $_SESSION["user_id"]) {
  echo "You don't have access to this device";
  exit();
}

$documents = documentList();

$pathToPages = $_SERVER["DOCUMENT_ROOT"] . "/pages/";

$twigLoader = new \Twig\Loader\FilesystemLoader($pathToPages);

$twig = new Twig\Environment($twigLoader);

$twig->addExtension(new PhpFunctionExtension(["str_contains"]));
$twig->addExtension(new SwitchTwigExtension());

$template = $twig->load("./Manufacturer/Device.twig");

echo $template->render(["uri" => $_SERVER["REQUEST_URI"], "session" => $_SESSION, "device" => $device, "documents" => $documents]);
