<?php
session_start();

use buzzingpixel\twigswitch\SwitchTwigExtension;

use Umpirsky\Twig\Extension\PhpFunctionExtension;


require $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";
require $_SERVER["DOCUMENT_ROOT"] . "/controller/search.php";


   $pathToPages = $_SERVER["DOCUMENT_ROOT"] . "/pages/";

   $twigLoader = new \Twig\Loader\FilesystemLoader($pathToPages);

   $twig = new Twig\Environment($twigLoader);

   $twig->addExtension(new PhpFunctionExtension(["str_contains"]));
   $twig->addExtension(new SwitchTwigExtension());

   $template = $twig->load("icd11EmbeddedSearch.twig");

   echo $template->render(["uri" => $_SERVER["REQUEST_URI"], "session" => $_SESSION]);

