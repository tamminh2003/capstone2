<?php
session_start();

use Umpirsky\Twig\Extension\PhpFunctionExtension;

require_once $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";
include_once "../controller/getGoogleClient.php"; // $create google api $client & $authUrl

/**
 * Rendering Twig Page
 */
$pathToPages = $_SERVER["DOCUMENT_ROOT"] . "/pages/";
$twigLoader = new \Twig\Loader\FilesystemLoader($pathToPages);
$twig = new Twig\Environment($twigLoader);
$twig->addExtension(new PhpFunctionExtension(['str_contains']));
$template = $twig->load("TestFileUpload.twig");
echo $template->render(["success" => $_GET['success'] ?? null]);
