<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Medical IoT Catalogue</title>
    <?php
    if (isset($_SESSION['user_id'])) {

        $FamilyName = $_SESSION['FamilyName'];
        $GivenName = $_SESSION['GivenName'];
        $User_Type = $_SESSION['user_type'];
        echo '<h1 id="header">Logged in as</h1>';
        echo "<h2 id='usertype'> $User_Type</h2>";
        echo "<h3 id='user'><b><i>$FamilyName $GivenName</i></b></h3>";



        echo '<div id="hamitems">
									<a href="/Capstone2/index.php">Home</a>
									<a href="/Capstone2/module/dashboard.php">Dashboard</a>
									<a href="/Capstone2/pages/catalogue.php">Browse Catalogue</a>
										<form action="/Capstone2/controller/logout.php" method="POST">
											<button type="submit" name="logout" id="but1">Logout</button>
										</form>
								</div>';
    } else {
        echo '<div id="hamitems">
									<a href="/Capstone2/index.php">Home</a>
									<a href="/Capstone2/controller/login.php">Login</a>
									<a href="/Capstone2/pages/register_form.php">Sign up</a>
								</div>';
    }

    ?>
</head>