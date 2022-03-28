<?php
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/controller/getGoogleToken.php';

if (isset($_GET['code'])) {
  $accessToken = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  $client->setAccessToken($accessToken);
  // store in the session also
  $_SESSION['access_token'] = $accessToken;

  $redirect_uri = "http://localhost:8000/pages/TestFileUpload.php";
  // redirect back to the example
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}
