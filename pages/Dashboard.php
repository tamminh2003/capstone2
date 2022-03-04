<?php
session_start();
var_dump($_SESSION);

use Umpirsky\Twig\Extension\PhpFunctionExtension;

require $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";
require $_SERVER["DOCUMENT_ROOT"] . "/controller/search.php";

$pathToPages = $_SERVER["DOCUMENT_ROOT"] . "/pages/";

$twigLoader = new \Twig\Loader\FilesystemLoader($pathToPages);

$twig = new Twig\Environment($twigLoader);

$twig->addExtension(new PhpFunctionExtension(["str_contains"]));

$template = $twig->load("Dashboard.twig");

$userType = $_SESSION['user_type'];

echo $template->render(["uri" => $_SERVER["REQUEST_URI"], "userType" => $userType]);
