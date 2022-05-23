<?php
session_start();

use buzzingpixel\twigswitch\SwitchTwigExtension;
use Umpirsky\Twig\Extension\PhpFunctionExtension;
use Utility\Utility;

require $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";
require $_SERVER["DOCUMENT_ROOT"] . "/controller/search.php";

$manufacturerId;
$deviceType;
$icd11Code;
$advancedText;

if(isset($_GET['freeText'] ) && isset ($_GET['deviceManufacturerID']) && isset($_GET['deviceTypeID']) && isset($_GET['deviceICD11Code'])) {

  
     $manufacturerId= $_GET['deviceManufacturerID'];
      $deviceType= $_GET['deviceTypeID'];
      $advancedText=$_GET['freeText'];
      $icd11Code=$_GET['deviceICD11Code'];
      $deviceConnectionType = $_GET['deviceConnectionType'];
      $devicEenergyType= $_GET['devicEenergyType'];

   $devices = advancedSearch2($advancedText,$manufacturerId,$deviceType,$icd11Code,$deviceConnectionType, $devicEenergyType);

require_once $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/controller/search.php";

   $pathToPages = $_SERVER["DOCUMENT_ROOT"] . "/pages/";

   $twigLoader = new \Twig\Loader\FilesystemLoader($pathToPages);

   $twig = new Twig\Environment($twigLoader);

   $twig->addExtension(new PhpFunctionExtension(["str_contains"]));
   $twig->addExtension(new SwitchTwigExtension());

   $template = $twig->load("AdvancedSearch.twig");

    echo $template->render(["uri" => $_SERVER["REQUEST_URI"], "session" => $_SESSION, "devices" => $devices]);

} else if (isset($_GET['advanced_text_search'])) {

   $advanced_text_search = $_GET['advanced_text_search'];

   $devices = advancedSearch($advanced_text_search);


   $pathToPages = $_SERVER["DOCUMENT_ROOT"] . "/pages/";

   $twigLoader = new \Twig\Loader\FilesystemLoader($pathToPages);

   $twig = new Twig\Environment($twigLoader);

   $twig->addExtension(new PhpFunctionExtension(["str_contains"]));
   $twig->addExtension(new SwitchTwigExtension());

   $template = $twig->load("AdvancedSearch.twig");

   echo $template->render(["uri" => $_SERVER["REQUEST_URI"], "session" => $_SESSION, "devices" => $devices]);
} 

else { 

   $pathToPages = $_SERVER["DOCUMENT_ROOT"] . "/pages/";

   $twigLoader = new \Twig\Loader\FilesystemLoader($pathToPages);

   $twig = new Twig\Environment($twigLoader);

   $twig->addExtension(new PhpFunctionExtension(["str_contains"]));
   $twig->addExtension(new SwitchTwigExtension());

   $template = $twig->load("AdvancedSearch.twig");

   echo $template->render(["uri" => $_SERVER["REQUEST_URI"], "session" => $_SESSION]);
}
