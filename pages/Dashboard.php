<?php

use Umpirsky\Twig\Extension\PhpFunctionExtension;

require $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";

$pathToPages = $_SERVER["DOCUMENT_ROOT"] . "/pages/";

$twigLoader = new \Twig\Loader\FilesystemLoader($pathToPages);

$twig = new Twig\Environment($twigLoader);

$twig->addExtension(new PhpFunctionExtension(["str_contains"]));

$template = $twig->load("Dashboard.twig");

echo $template->render(["uri" => $_SERVER["REQUEST_URI"]]);
