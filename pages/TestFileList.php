<?php
session_start();

use Umpirsky\Twig\Extension\PhpFunctionExtension;

require_once $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";
include_once "../controller/getGoogleClient.php"; // $create google api $client & $authUrl

$service = new Google\Service\Drive($client);

// Print the names and IDs for up to 10 files.
$optParams = array(
  'pageSize' => 10,
  'fields' => 'nextPageToken, files(id, name, webContentLink, webViewLink)'
);
$results = $service->files->listFiles($optParams);

$files = [];
foreach ($results->files as $eachFile) {
  array_push($files, 
  array(
    "name" => $eachFile->name, 
    "id" => $eachFile->id, 
    "download" => $eachFile->getWebContentLink(),
    "view" =>$eachFile->getWebViewLink()
  ));
}

/**
 * Rendering Twig Page
 */
$pathToPages = $_SERVER["DOCUMENT_ROOT"] . "/pages/";
$twigLoader = new \Twig\Loader\FilesystemLoader($pathToPages);
$twig = new Twig\Environment($twigLoader);
$twig->addExtension(new PhpFunctionExtension(['str_contains']));
$template = $twig->load("TestFileList.twig");
echo $template->render(["files" => $files]);
