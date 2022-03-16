<?php
session_start();

use buzzingpixel\twigswitch\SwitchTwigExtension;
use Propel\PoctDevice;
use Propel\PoctDeviceQuery;
use Umpirsky\Twig\Extension\PhpFunctionExtension;
use Utility\Utility;

require $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";
require $_SERVER["DOCUMENT_ROOT"] . "/controller/search.php";

if (!isset($_GET['device_id'])) {
  Utility::log("\$_GET['device_id'] not found");
  exit();
}

$device = PoctDeviceQuery::create()->filterByPoctDeviceId($_GET['device_id'])->find()->getFirst();

$pathToPages = $_SERVER["DOCUMENT_ROOT"] . "/pages/";

$twigLoader = new \Twig\Loader\FilesystemLoader($pathToPages);

$twig = new Twig\Environment($twigLoader);

$twig->addExtension(new PhpFunctionExtension(["str_contains"]));
$twig->addExtension(new SwitchTwigExtension());

$template = $twig->load("./Device.twig");

echo $template->render(["uri" => $_SERVER["REQUEST_URI"], "session" => $_SESSION, "device" => $device]);
