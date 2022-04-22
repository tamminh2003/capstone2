<?php

if (!isset($_SESSION)) session_start();
defined("AUTHORIZED_USER") or define("AUTHORIZED_USER", array("RESEARCHER"));

/**
 * Researcher Authorization
 */
require_once $_SERVER["DOCUMENT_ROOT"] . "/controller/utility.php";
Utility\userAuthorization($_SESSION["user_type"], AUTHORIZED_USER, true);

use buzzingpixel\twigswitch\SwitchTwigExtension;
use Umpirsky\Twig\Extension\PhpFunctionExtension;

require_once $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";

$device_id = isset($_GET["device_id"]) ? $_GET["device_id"] : null;

$pathToPages = $_SERVER["DOCUMENT_ROOT"] . "/pages/";
$twigLoader = new \Twig\Loader\FilesystemLoader($pathToPages);
$twig = new Twig\Environment($twigLoader);
$twig->addExtension(new PhpFunctionExtension(["str_contains"]));
$twig->addExtension(new SwitchTwigExtension());
$template = $twig->load("./Researcher/DocumentAdd.twig");

echo $template->render(["uri" => $_SERVER["REQUEST_URI"], "session" => $_SESSION, "device_id" => $device_id]);
