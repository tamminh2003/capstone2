<?php
if (!isset($_SESSION)) session_start();
defined("AUTHORIZED_USER") or define("AUTHORIZED_USER", array("MANUFACTURER"));

/**
 * User Authorization
 */
require_once $_SERVER["DOCUMENT_ROOT"] . "/controller/utility.php";
Utility\userAuthorization($_SESSION["user_type"], AUTHORIZED_USER, true);

use buzzingpixel\twigswitch\SwitchTwigExtension;
use Umpirsky\Twig\Extension\PhpFunctionExtension;

require_once $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/controller/manufacturer/documentList.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/controller/manufacturer/imageList.php";

/**
 * Device access authorization, other manufacturers are not authorized to see.
 * Redirect back to DeviceList.php if not authorized
 */
$device = Utility\getDeviceById($_GET["device_id"]);
if ($device["user_user_id"] != $_SESSION["user_id"]) {
  header("Location: /pages/Manufacturer/DeviceList.php");
  exit();
}

/** 
 * Load device-related images
 */
$images = imageList($_GET["device_id"]);

/**
 * Load device-related documents
 */
$documents = documentList($_GET["device_id"]);

$pathToPages = $_SERVER["DOCUMENT_ROOT"] . "/pages/";
$twigLoader = new \Twig\Loader\FilesystemLoader($pathToPages);
$twig = new Twig\Environment($twigLoader);
$twig->addExtension(new PhpFunctionExtension(["str_contains"]));
$twig->addExtension(new SwitchTwigExtension());
$template = $twig->load("./Manufacturer/Device.twig");

echo $template->render(["uri" => $_SERVER["REQUEST_URI"], "session" => $_SESSION, "device" => $device, "documents" => $documents, "images" => $images]);
