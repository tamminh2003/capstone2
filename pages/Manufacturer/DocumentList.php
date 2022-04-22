<?php
// NOT-USED FILE
if (!isset($_SESSION)) session_start();
defined("AUTHORIZED_USER") or define("AUTHORIZED_USER", array("MANUFACTURER"));

/**
 * Manufacturer Authorization
 */
require_once $_SERVER["DOCUMENT_ROOT"] . "/controller/utility.php";
Utility\userAuthorization($_SESSION["user_type"], AUTHORIZED_USER, true);

require_once $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/controller/documentList.php";

// Utility\userAuthorization();

// $documents = documentList();

$pathToPages = $_SERVER["DOCUMENT_ROOT"] . "/pages/";

$twigLoader = new \Twig\Loader\FilesystemLoader($pathToPages);

$twig = new Twig\Environment($twigLoader);

// $twig->addExtension(new PhpFunctionExtension(["str_contains"]));
// $twig->addExtension(new SwitchTwigExtension());

$template = $twig->load("./Manufacturer/DocumentList.twig");

echo $template->render(["uri" => $_SERVER["REQUEST_URI"], "session" => $_SESSION, "documents" => $documents]);
