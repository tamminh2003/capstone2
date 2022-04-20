<?php
session_start();
const AUTHORIZED_USER = ['MANUFACTURER'];

use buzzingpixel\twigswitch\SwitchTwigExtension;
use Umpirsky\Twig\Extension\PhpFunctionExtension;

require $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";
require $_SERVER["DOCUMENT_ROOT"] . "/controller/utility.php";

Utility\userAuthorization($_SESSION["user_type"], AUTHORIZED_USER, true);

$device = Utility\getDeviceById($_GET["device_id"]);
$addImage = isset($_GET["addImage"]);

$pathToPages = $_SERVER["DOCUMENT_ROOT"] . "/pages/";

$twigLoader = new \Twig\Loader\FilesystemLoader($pathToPages);

$twig = new Twig\Environment($twigLoader);

$twig->addExtension(new PhpFunctionExtension(["str_contains"]));
$twig->addExtension(new SwitchTwigExtension());

$template = $twig->load("./Manufacturer/DocumentAdd.twig");

echo $template->render(["uri" => $_SERVER["REQUEST_URI"], "session" => $_SESSION, "device" => $device, "addImage" => $addImage]);
