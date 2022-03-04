<?php
session_start();
//require $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";
//require $_SERVER["DOCUMENT_ROOT"] . "/generated-conf/config.php";
//
//use Sabre\HTTP\Response;
//
//$response = new Response();
//
//$response->setStatus(200);
//$response->setBody("hello");
//
//Sabre\HTTP\SAPI::sendResponse($response);
use Propel\UsersQuery;

try {
	require $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";
	require $_SERVER["DOCUMENT_ROOT"] . "/generated-conf/config.php";

	$UserName = $_POST["processUsername"];
	$Password = $_POST["processPassword"];
	$retrieveUserData = UsersQuery::create()->findByUserUsername($UserName);
	$unit = $retrieveUserData->getFirst();

	if (!empty($unit)) {
		$passwirt = $unit->getUserPassword();
		$HashPass = password_verify($Password, $passwirt);

		if ($HashPass == false) {
			echo "Fail";
		} else {
			$_SESSION["user_id"] = $unit->getUserId();
			$_SESSION["FamilyName"] = $unit->getUserFirstname();
			$_SESSION["GivenName"] = $unit->getUserLastname();
			$_SESSION["user_type"] = $unit->getUserType();

			echo "verified";
		}
	} else {
		echo "Fail";
	}
} catch (Throwable $error) {
	file_put_contents("php://stderr", $error);
}
