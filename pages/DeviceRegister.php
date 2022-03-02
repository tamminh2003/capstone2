<?php

require $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";

require $_SERVER["DOCUMENT_ROOT"] . "/controller/search.php";

// $search = new Search();

$pathToPages = $_SERVER["DOCUMENT_ROOT"] . "/pages/";
$twigLoader = new \Twig\Loader\FilesystemLoader($pathToPages);
$twig = new Twig\Environment($twigLoader);

$template = $twig->load("DeviceRegister.twig");

echo $template->render();
