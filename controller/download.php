<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/controller/getGoogleClient.php';

// var_dump($_SERVER);

$fileId = $_GET["fileId"];

$service = new Google\Service\Drive($client);

$fileData = $service->files->get($fileId, ["alt" => "media"]);

// var_dump($fileData);

/** @phpstan-ignore-next-line */
$content = $fileData->getBody()->getContents();

// var_dump($content);

$path = $_SERVER['DOCUMENT_ROOT'] . "/temp/" . 'placeholder.jpeg';

file_put_contents($path, $content);

$downloadUrl = "http://" . $_SERVER["HTTP_HOST"] . "/temp/" . "placeholder.jpeg";

?>

<a href=<?= $downloadUrl ?> download="placeholder.jpeg">Download</a>