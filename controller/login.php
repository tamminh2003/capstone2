<?php
if (!isset($_SESSION)) session_start();

use Propel\UserQuery;

try {
	require_once $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";
	require_once $_SERVER["DOCUMENT_ROOT"] . "/generated-conf/config.php";

	$UserName = $_POST["processUsername"];
	$Password = $_POST["processPassword"];
	$retrieveUserData = UserQuery::create()->findByUserUsername($UserName);
	$unit = $retrieveUserData->getFirst();

	if (!empty($unit)) {
		$passwirt = $unit->getUserPassword();
		$HashPass = password_verify($Password, $passwirt);

		if ($HashPass == false) {
			echo "Fail";
		} else {
			$_SESSION["user_id"] = $unit->getUserId();
			$_SESSION["firstname"] = $unit->getUserFirstname();
			$_SESSION["lastname"] = $unit->getUserLastname();
			$_SESSION["user_type"] = $unit->getUserType();

			echo "verified";
		}
	} else {
		echo "Fail";
	}
} catch (Throwable $error) {
	file_put_contents("php://stderr", $error);
}
