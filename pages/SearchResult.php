<?php

use buzzingpixel\twigswitch\SwitchTwigExtension;
use Umpirsky\Twig\Extension\PhpFunctionExtension;

require $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";

require $_SERVER["DOCUMENT_ROOT"] . "/controller/search.php";

if (isset($_GET["searchMethod"])) {
  $search = new Search();
}

$pathToPages = $_SERVER["DOCUMENT_ROOT"] . "/pages/";

$twigLoader = new \Twig\Loader\FilesystemLoader($pathToPages);

$twig = new Twig\Environment($twigLoader);

$twig->addExtension(new PhpFunctionExtension(["str_contains"]));

$twig->addExtension(new SwitchTwigExtension());

$template = $twig->load("SearchResult.twig");

if (isset($_GET["searchMethod"])) {
  echo $template->render(["items" => $search->getResult()]);
} else {
  echo $template->render();
}
