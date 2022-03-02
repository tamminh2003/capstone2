<?php
require $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";
require $_SERVER["DOCUMENT_ROOT"] . "/generated-conf/config.php";

//use Propel\Runtime\Propel; // composer install?
use Propel\Map\UsersTableMap;
use Propel\Users;
use Propel\UsersQuery;


$FirstName = $_POST['RegisterFirstName'];
$LastName = $_POST['RegisterLastName'];
$Email = $_POST['RegisterEmail'];
$UserType = $_POST['RegisterUserType'];
$Username = $_POST['RegisterUsername'];
$Password = $_POST['RegisterPassword'];
$response = "";


$con = Propel::getReadConnection(UsersTableMap::DATABASE_NAME);
$numEmails = UsersQuery:: create()
    ->findByUserEmail($Email)
    ->count($con);

if($numEmails == 1)//check for email duplicates
{
    $response = "DOUBLE_JEOPARDY";
    echo $response; //bugged, prints numbers in front of it
}
else
{

    $numUsernames = UsersQuery:: create()
        ->findByUserUsername($Username)
        ->count($con);

    if($numUsernames == 1)//check for username duplicates
    {
        $response = "USERNAME";
        echo $response;
    }
    else
    {
        $Hash = password_hash($Password, PASSWORD_ARGON2I);
        $register_user = new Users();
        $register_user->setUserFirstname($FirstName);
        $register_user->setUserLastname($LastName);
        $register_user->setUserEmail($Email);
        $register_user->setUserType($UserType);
        $register_user->setUserUsername($Username);
        $register_user->setUserPassword($Hash);
        $register_user->save();
        $response = "SUCCESS";
        echo $response;
    }

}
?>