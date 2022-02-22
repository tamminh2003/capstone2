<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/Capstone2/module/header.php");
if(isset($_GET['Well']))
{

    $Message=$_GET['Well'];
    echo '<h3 class="welcome">Welcome!</h3>';

}
echo '<h1 class="dashboard">Dashboard</h1>';
?>


<?php require_once($_SERVER["DOCUMENT_ROOT"]."/Capstone2/module/footer.php"); ?>