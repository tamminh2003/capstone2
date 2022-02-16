<?php
include "header.php";
if(isset($_GET['Well']))
{

    $Message=$_GET['Well'];
    echo '<h1 class="home">Dashboard</h1>';

}
?>


<?php require_once('footer.php'); ?>