<?php

require $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";

$pathToPages = $_SERVER["DOCUMENT_ROOT"] . "/pages/";

$twigLoader = new \Twig\Loader\FilesystemLoader($pathToPages);

$twig = new Twig\Environment($twigLoader);

$template = $twig->load("Homepage.twig");

echo $template->render();
