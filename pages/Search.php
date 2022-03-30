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



if (isset($_GET['free_text_search'])) {

   $free_text_search = $_GET['free_text_search'];

   $devices = freeTextSearch($free_text_search);


   $pathToPages = $_SERVER["DOCUMENT_ROOT"] . "/pages/";

   $twigLoader = new \Twig\Loader\FilesystemLoader($pathToPages);

   $twig = new Twig\Environment($twigLoader);

   $twig->addExtension(new PhpFunctionExtension(["str_contains"]));
   $twig->addExtension(new SwitchTwigExtension());

   $template = $twig->load("Search.twig");

   echo $template->render(["uri" => $_SERVER["REQUEST_URI"], "session" => $_SESSION, "devices" => $devices]);
} else {

   $pathToPages = $_SERVER["DOCUMENT_ROOT"] . "/pages/";

   $twigLoader = new \Twig\Loader\FilesystemLoader($pathToPages);

   $twig = new Twig\Environment($twigLoader);

   $twig->addExtension(new PhpFunctionExtension(["str_contains"]));
   $twig->addExtension(new SwitchTwigExtension());

   $template = $twig->load("Search.twig");

   echo $template->render(["uri" => $_SERVER["REQUEST_URI"], "session" => $_SESSION]);
}
