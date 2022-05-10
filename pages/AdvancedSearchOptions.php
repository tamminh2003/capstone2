<?php
session_start();

use buzzingpixel\twigswitch\SwitchTwigExtension;
use Google\Service\Adsense\Alert;
use Google\Service\CloudSearch\UserId;
use Propel\PoctDevice;
use Propel\User;
use Propel\UserQuery;
use Propel\PoctDeviceQuery;
use Umpirsky\Twig\Extension\PhpFunctionExtension;
use Utility\Utility;


require $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";
require $_SERVER["DOCUMENT_ROOT"] . "/controller/advancedSearchOptions.php";

$manufacturers = populateManufacturerDropdown();
$deviceTypes = populateDeviceTypeDropdown();
$freeText;
if (isset($_GET['freeText'])) {
  $freeText =   $_GET['freeText'];
}

$pathToPages = $_SERVER["DOCUMENT_ROOT"] . "/pages/";

$twigLoader = new \Twig\Loader\FilesystemLoader($pathToPages);

$twig = new Twig\Environment($twigLoader);

$twig->addExtension(new PhpFunctionExtension(["str_contains"]));
$twig->addExtension(new SwitchTwigExtension());

$template = $twig->load("AdvancedSearchOptions.twig");


echo $template->render(["uri" => $_SERVER["REQUEST_URI"], "session" => $_SESSION, "manufacturers" => $manufacturers, "deviceTypes" => $deviceTypes, "advancedText" => $freeText]);

