<?php

require_once('connection.php');

if(isset($_POST['Register']))
{
    if(empty($_POST['FamilyName']) || empty($_POST['GivenName']))
    {
        header("location: register_form.php?missingNames");//names empty
        exit();
    }
    elseif(empty($_POST["Email"])){
        header("location: register_form.php?missingEmail");//Email empty
        exit();
    }
    elseif(empty($_POST["user_type"])){
        header("location: register_form.php?userType");//user type missing
        exit();
    }
    elseif(empty(trim($_POST["Username"]))){
        header("location: register_form.php?UsernameEmpty");//username missing
        exit();
    }
    elseif(empty(trim($_POST["Password"]))){
        header("location: register_form.php?PasswordEmpty");//password missing
        exit();
    }
    elseif(empty(trim($_POST["Confirm_Password"]))){
        header("location: register_form.php?PasswordConfirm");//password confirmation missing
        exit();
    }
    else
    {
        $FamilyName=mysqli_real_escape_string($con,$_POST['FamilyName']);
        $GivenName=mysqli_real_escape_string($con,$_POST['GivenName']);
        $Email=mysqli_real_escape_string($con,$_POST['Email']);
        $User_Type=mysqli_real_escape_string($con,$_POST['user_type']);
        $Username=mysqli_real_escape_string($con,$_POST['Username']);
        $Password=mysqli_real_escape_string($con,$_POST['Password']);
        $Password_confirmation=mysqli_real_escape_string($con,$_POST['Confirm_Password']);
//        print("user type is $User_Type");
        print("Name check start");
        if(!preg_match("/^[a-zA-Z]*$/",$FamilyName) || !preg_match("/^[a-zA-Z]*$/",$GivenName))
        {
            header("location: register_form.php?Invalid");
            exit();
        }
        else
        {
            print("Name check good");
            print("Email check start");
            if(!preg_match('/^([a-z0-9_\-]+)(\.[a-z0-9_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix', $Email)){
                print("that's not an Email address");
                header("location: register_form.php?NotAnAddress");//check for valid email address structure
                exit();
            }
            $query = " select * from users where user_email ='".$Email."'";
            $stmt = mysqli_prepare($con,$query);

            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt)==1)
                {
                    print("Email check failed");
                    header("location: register_form.php?double_jeopardy");//changed to check for email duplicates
                    exit();
                }
                else
                {
                    print("Email check good");
                    print("Username check start");
                        if(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["Username"]))){
                            header("location: register_form.php?UsernameInvalid");
                            exit();
                        }
                        else{
                            $query = " select * from users where user_username='".$Username."'";
                            $stmt = mysqli_prepare($con,$query);

                            if(mysqli_stmt_execute($stmt)){
                                mysqli_stmt_store_result($stmt);

                                if(mysqli_stmt_num_rows($stmt)==1) {
                                    header("location: register_form.php?Username");
                                    exit();
                                }
                                else
                                {
                                    // Validate password
                                    if(strlen(trim($_POST["Password"])) < 6 || strlen(trim($_POST["Password"])) > 100){
                                        header("location: register_form.php?PasswordSize");
                                        exit();//change to just validation, length is part of it, must have special characters
                                    }
                                    elseif(!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!]+$/',trim($_POST["Password"]))
                                    ){
                                        header("location: register_form.php?PasswordNonono");
                                        exit();//special characters test - working
                                    }
                                    else{
                                        // Validate confirm password
                                        if($Password != $Password_confirmation){
                                            header("location: register_form.php?PasswordMismatch");
                                            exit();
                                        }
                                        else {
                                            $Hash = password_hash($Password, PASSWORD_ARGON2I);
                                            $query = " insert into users (user_firstname, user_lastname, user_email, user_type, user_username, user_password)
                                                        values ('$GivenName', '$FamilyName', '$Email', '$User_Type','$Username', '$Hash')";
                                            $result = mysqli_query($con, $query);
                                            mysqli_close($con);
                                            header("location: register_form.php?success");
                                            exit();//try look for other hash algorithms - changed to Bcyrpt for now, turns out it needs separate config support
                                        }
                                    }
                                }
                            }
                            else{
                                echo "Oops! Something went wrong. Please try again later.--usernameChekFail";
                            }
                        }
                    }
            }
            else{
                echo "Oops! Something went wrong. Please try again later.--emailChekFail";
            }
            }
        }
    }
else
{
    header("location: index.php");
    exit();
}

?>