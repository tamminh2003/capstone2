<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/controller/getGoogleClient.php';

var_dump($_FILES);
$target_file = $_FILES["upload"]["tmp_name"];

$service = new Google\Service\Drive($client);
$file = new Google\Service\Drive\DriveFile();
$file->setName("placholder_test.jpeg");

$result = $service->files->create(
  $file,
  array(
    'data' => file_get_contents($target_file),
    'mimeType' => 'application/octet-stream',
    'uploadType' => 'media'
  )
);

$redirect_uri = "http://localhost:8000/pages/TestFileUpload.php";
header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
