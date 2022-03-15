<?php
session_start();

use buzzingpixel\twigswitch\SwitchTwigExtension;
use Umpirsky\Twig\Extension\PhpFunctionExtension;

require $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";

if (!$_SESSION['user_type']) {
  $url = $_SEVER['HTTP_HOST'] . '/pages/Login.php';
  header("Location:" . $url);
}
else {
$pathToPages = $_SERVER["DOCUMENT_ROOT"] . "/pages/";

$twigLoader = new \Twig\Loader\FilesystemLoader($pathToPages);

$twig = new Twig\Environment($twigLoader);

$twig->addExtension(new PhpFunctionExtension(["str_contains"]));
$twig->addExtension(new SwitchTwigExtension());

$template = $twig->load("Dashboard.twig");

$userType = $_SESSION['user_type'];

echo $template->render(["uri" => $_SERVER["REQUEST_URI"], "session" => $_SESSION]);
}

