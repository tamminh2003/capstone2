<?php require_once($_SERVER["DOCUMENT_ROOT"]."/GeigerMark/module/header.php"); ?>
<?php
$UserName = "";
$_SESSION['success'] = "";
require_once('../db/connection.php');

if(isset($_POST['login']))
{
    if(empty($_POST['Username']) || empty($_POST['Password']) )
    {
        echo "<h3 style='color:red'>fill in form</h2>";

    }
    else
    {
        $UserName = mysqli_real_escape_string($con,$_POST['Username']);
        $Password = mysqli_real_escape_string($con,$_POST['Password']);
        //$Hash = password_hash($Password, PASSWORD_DEFAULT);
        $Query = " select * from users where user_username='".$UserName."'";/* and Password='".$Hash."'";*/
        $result = mysqli_query($con,$Query);

        if($row=mysqli_fetch_assoc($result))
        {
            $HashPass = password_verify($Password,$row['user_password']);

            if($HashPass==false)
            {
                echo "<h3 style='color:red'>Incorrect password</h2>";

            }
            elseif($HashPass==true)
            {
                $_SESSION['user_id']=$row['user_id'];
                $_SESSION['FamilyName']=$row['user_firstname'];
                $_SESSION['GivenName']=$row['user_lastname'];
                $_SESSION['Password']=$row['user_password'];
                $_SESSION['user_type']=$row['user_type'];

                header("location: /GeigerMark/module/dashboard.php?Well");

            }
        }
        else
        {
            echo"<h3 style='color:red'>Incorrect username</h2>";

        }
    }
    //mysqli_free_result($result);
}

?>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="home" class="card bg-light mt-5">
                    <div class="card-title bg-primary text-white mt-5">
                        <h1 class="text-center py-2">Login Form</h1>
                    </div>
                    <div class="card-body">

                        <form action="<?php $_SERVER["PHP_SELF"];?>" method="POST" >
                            <input type="text" name="Username" placeholder="Username" class="form-control my-2" value="<?php if(isset($UserName)) echo $UserName;?>" required>
                            <input type="password" name="Password" placeholder="Password" class="form-control mb-3"  value="<?php if(isset($Password)) echo $Password;?>" required>
                            <button type="submit" class="btn btn-success" name="login" class="pt-3">Login</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once($_SERVER["DOCUMENT_ROOT"]."/GeigerMark/module/footer.php"); ?>