<?php
if (!isset($_SESSION)) session_start();

use buzzingpixel\twigswitch\SwitchTwigExtension;
use Umpirsky\Twig\Extension\PhpFunctionExtension;

require_once $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";

if (!isset($_SESSION['user_type'])) {
  $url = '/pages/Login.php';
  header("Location:" . $url);
  exit();
}

$pathToPages = $_SERVER["DOCUMENT_ROOT"] . "/pages/";
$twigLoader = new \Twig\Loader\FilesystemLoader($pathToPages);
$twig = new Twig\Environment($twigLoader);
$twig->addExtension(new PhpFunctionExtension(["str_contains"]));
$twig->addExtension(new SwitchTwigExtension());
$template = $twig->load("Dashboard.twig");

echo $template->render(["uri" => $_SERVER["REQUEST_URI"], "session" => $_SESSION]);
