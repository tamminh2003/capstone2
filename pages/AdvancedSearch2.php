<?php
session_start();

use buzzingpixel\twigswitch\SwitchTwigExtension;
use Google\Service\Adsense\Alert;
use Propel\PoctDevice;
use Propel\PoctDeviceQuery;
use Umpirsky\Twig\Extension\PhpFunctionExtension;
use Utility\Utility;

require $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";
require $_SERVER["DOCUMENT_ROOT"] . "/controller/search.php";
require $_SERVER["DOCUMENT_ROOT"] . "/controller/advancedSearchOptions.php";

$manufacturerId;
$deviceType;
$icd11Code;
$advancedText;


$manufacturers = populateManufacturerDropdown();
$deviceTypes = populateDeviceTypeDropdown();
$deviceEnergyTypes = populateDeviceEnergyTypeDropdown();
$deviceconnectionTypes = populateDeviceConnectionTypeDropdown();

if(isset($_POST['freeText'] ) && isset ($_POST['deviceManufacturer']) && isset($_POST['deviceType']) && isset($_POST['deviceICD11Code']) && isset($_POST['devicEenergyType']) && isset($_POST['deviceConnectionType'])) {

  
     $manufacturer= $_POST['deviceManufacturer'];
      $deviceType= $_POST['deviceType'];
      $advancedText=$_POST['freeText'];
      $icd11Code=$_POST['deviceICD11Code'];
      $connectionType = $_POST['deviceConnectionType'];
      $energyType= $_POST['devicEenergyType'];

     

   $devices = advancedSearch2($advancedText,$manufacturer,$deviceType,$icd11Code,$connectionType, $energyType);
if (count($devices)>0) {
   


   $pathToPages = $_SERVER["DOCUMENT_ROOT"] . "/pages/";

   $twigLoader = new \Twig\Loader\FilesystemLoader($pathToPages);

   $twig = new Twig\Environment($twigLoader);

   $twig->addExtension(new PhpFunctionExtension(["str_contains"]));
   $twig->addExtension(new SwitchTwigExtension());

   $template = $twig->load("AdvancedSearch2.twig");

    echo $template->render(["uri" => $_SERVER["REQUEST_URI"], "session" => $_SESSION, "devices" => $devices, "manufacturers" => $manufacturers, "deviceConnectionTypes" => $deviceconnectionTypes, "deviceEnergyTypes" => $deviceEnergyTypes, "deviceTypes" => $deviceTypes]);

} else {

    $pathToPages = $_SERVER["DOCUMENT_ROOT"] . "/pages/";

   $twigLoader = new \Twig\Loader\FilesystemLoader($pathToPages);

   $twig = new Twig\Environment($twigLoader);

   $twig->addExtension(new PhpFunctionExtension(["str_contains"]));
   $twig->addExtension(new SwitchTwigExtension());

   $template = $twig->load("AdvancedSearch2.twig");
   $searchErrorMsg = "No Devices exists for the selected criteria, Try differest set of filters or use the search bar for free text search through the following criterias, Device ID
   Device Generic Name 
   Device Manufacturer Name
   Device Type
   Device Model 
   Device Energy Type 
   Device Connection Type 
   Disease name 
   ICD-11 Code.";
   $searchErrorMsgClass = "alert alert-warning";

    echo $template->render(["uri" => $_SERVER["REQUEST_URI"], "session" => $_SESSION, "searchErrorMsg" => $searchErrorMsg, "searchErrorMsgClass" => $searchErrorMsgClass, "manufacturers" => $manufacturers, "deviceConnectionTypes" => $deviceconnectionTypes, "deviceEnergyTypes" => $deviceEnergyTypes, "deviceTypes" => $deviceTypes]);

}
} else if (isset($_POST['advanced_text_search'])) {

   $advanced_text_search = $_POST['advanced_text_search'];

   $devices = advancedSearch($advanced_text_search);


   $pathToPages = $_SERVER["DOCUMENT_ROOT"] . "/pages/";

   $twigLoader = new \Twig\Loader\FilesystemLoader($pathToPages);

   $twig = new Twig\Environment($twigLoader);

   $twig->addExtension(new PhpFunctionExtension(["str_contains"]));
   $twig->addExtension(new SwitchTwigExtension());

   $template = $twig->load("AdvancedSearch2.twig");

   echo $template->render(["uri" => $_SERVER["REQUEST_URI"], "session" => $_SESSION, "devices" => $devices, "manufacturers" => $manufacturers, "deviceConnectionTypes" => $deviceconnectionTypes, "deviceEnergyTypes" => $deviceEnergyTypes, "deviceTypes" => $deviceTypes]);
} 

else { 

   $pathToPages = $_SERVER["DOCUMENT_ROOT"] . "/pages/";

   $twigLoader = new \Twig\Loader\FilesystemLoader($pathToPages);

   $twig = new Twig\Environment($twigLoader);

   $twig->addExtension(new PhpFunctionExtension(["str_contains"]));
   $twig->addExtension(new SwitchTwigExtension());

   $template = $twig->load("AdvancedSearch2.twig");

   echo $template->render(["uri" => $_SERVER["REQUEST_URI"], "session" => $_SESSION, "manufacturers" => $manufacturers, "deviceConnectionTypes" => $deviceconnectionTypes, "deviceEnergyTypes" => $deviceEnergyTypes, "deviceTypes" => $deviceTypes]);
}
