<?php

if (!isset($_SESSION)) session_start();


/**
 * User Authorization
 */
require_once $_SERVER["DOCUMENT_ROOT"] . "/controller/utility.php";


use buzzingpixel\twigswitch\SwitchTwigExtension;
use Umpirsky\Twig\Extension\PhpFunctionExtension;

require_once $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/controller/documentList.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/controller/imageList.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/controller/RDocumentList.php";

/**
 * Device access authorization, other manufacturers are not authorized to see.
 *
 */
$device = Utility\getDeviceById($_GET["device_id"]);


/**
 * Load device-related images
 */
$images = imageList($_GET["device_id"]);

/**
 * Load device-related images
 */
$RDocuments = rDocumentList($_GET["device_id"]);

/**
 * Load device-related documents
 */
$documents = documentList($_GET["device_id"]);

/**
 * Load diseases of device
 */
$diseases = Utility\getDiseaseByDevice($_GET["device_id"]);

$pathToPages = $_SERVER["DOCUMENT_ROOT"] . "/pages/";
$twigLoader = new \Twig\Loader\FilesystemLoader($pathToPages);
$twig = new Twig\Environment($twigLoader);
$twig->addExtension(new PhpFunctionExtension(["str_contains"]));
$twig->addExtension(new SwitchTwigExtension());
$template = $twig->load("./Device.twig");

echo $template->render(
  [
    "uri" => $_SERVER["REQUEST_URI"],
    "session" => $_SESSION,
    "device" => $device,
    "documents" => $documents,
    "images" => $images,
    "RDocuments" => $RDocuments,
    "diseases" => $diseases
  ]
);
