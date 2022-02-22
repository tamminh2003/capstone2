<?php require_once($_SERVER["DOCUMENT_ROOT"]."/Capstone2/module/header.php"); ?>

    <div>
        <div>
            <div>
                <div class="home" >

                    <div >
                        <h1 >Registration Form</h1>
                    </div>

                    <!--names missing-->
                    <?php

                    if(isset($_GET["missingNames"]))
                    {
                        $Message=$_GET["missingNames"];
                        $Message="Family or Given names missing.\n Please fill out.";
                        ?>
                        <div><?php echo $Message?></div>
                        <?php
                    }

                    ?>

                    <!--email missing-->
                    <?php

                    if(isset($_GET["missingEmail"]))
                    {
                        $Message=$_GET["missingEmail"];
                        $Message="Email not given. \n Please fill out.";
                        ?>
                        <div><?php echo $Message?></div>
                        <?php
                    }

                    ?>

                    <!-- User type missing-->
                    <?php

                    if(isset($_GET['userType']))
                    {
                        $Message=$_GET['userType'];
                        $Message=" User type empty ";
                        ?>
                        <div><?php echo $Message?></div>
                        <?php
                    }

                    ?>

                    <!--Username Field Empty-->
                    <?php

                    if(isset($_GET['UsernameEmpty']))
                    {
                        $Message=$_GET['UsernameEmpty'];
                        $Message=" Please enter a username ";
                        ?>
                        <div><?php echo $Message?></div>
                        <?php
                    }

                    ?>

                    <!--Password Field Empty-->
                    <?php

                    if(isset($_GET['PasswordEmpty']))
                    {
                        $Message=$_GET['PasswordEmpty'];
                        $Message="Please enter a password.";
                        ?>
                        <div><?php echo $Message?></div>
                        <?php
                    }

                    ?>

                    <!--Password confirmation missing-->
                    <?php

                    if(isset($_GET['PasswordConfirm']))
                    {
                        $Message=$_GET['PasswordConfirm'];
                        $Message=" Please confirm password. ";
                        ?>
                        <div><?php echo $Message?></div>
                        <?php
                    }

                    ?>

                    <!--Invalid Character in Family and Given Name-->
                    <?php

                    if(isset($_GET['Invalid']))
                    {
                        $Message=$_GET['Invalid'];
                        $Message=" Invalid Characters in Family Name and Given Name";
                        ?>
                        <div><?php echo $Message?></div>
                        <?php
                    }

                    ?>

                    <!--Invalid Email: email format wrong-->
                    <?php

                    if(isset($_GET['NotAnAddress']))
                    {
                        $Message=$_GET['NotAnAddress'];
                        $Message=" That is not an email address, what are you doing? ";
                        ?>
                        <div><?php echo $Message?></div>
                        <?php
                    }

                    ?>

                    <!--Invalid Email: Double Jeopardy-->
                    <?php

                    if(isset($_GET['double_jeopardy']))
                    {
                        $Message=$_GET['double_jeopardy'];
                        $Message=" You can only have one account ";
                        ?>
                        <div><?php echo $Message?></div>
                        <?php
                    }

                    ?>

                    <!--Username Invalid-->
                    <?php

                    if(isset($_GET['UsernameInvalid']))
                    {
                        $Message=$_GET['UsernameInvalid'];
                        $Message=" Username can only contain letters, numbers, and underscores ";
                        ?>
                        <div><?php echo $Message?></div>
                        <?php
                    }

                    ?>

                    <!--Username Already Taken-->
                    <?php

                    if(isset($_GET['Username']))
                    {
                        $Message=$_GET['Username'];
                        $Message=" Username Already Taken ";
                        ?>
                        <div><?php echo $Message?></div>
                        <?php
                    }

                    ?>

                    <!--Password too big or too small-->
                    <?php

                    if(isset($_GET['PasswordSize']))
                    {
                        $Message=$_GET['PasswordSize'];
                        $Message=" Password must have at least 6 characters. MAX password size: 100 characters ";
                        ?>
                        <div><?php echo $Message?></div>
                        <?php
                    }

                    ?>

                    <!--Password has no special characters-->
                    <?php

                    if(isset($_GET['PasswordNonono']))
                    {
                        $Message=$_GET['PasswordNonono'];
                        $Message=" Password must have special characters ";
                        ?>
                        <div><?php echo $Message?></div>
                        <?php
                    }

                    ?>

                    <!--Password confirmation fail-->
                    <?php

                    if(isset($_GET['PasswordMismatch']))
                    {
                        $Message=$_GET['PasswordMismatch'];
                        $Message=" Password did not match. ";
                        ?>
                        <div><?php echo $Message?></div>
                        <?php
                    }

                    ?>

                    <!--success-->
                    <?php

                    if(isset($_GET['success']))
                    {
                        $Message=$_GET['success'];
                        $Message="  You Have Successfully Signed Up ";
                        ?>
                        <div><?php echo $Message?></div>
                        <?php
                    }

                    ?>


                    <div>
                        <form action="/Capstone2/controller/register.php" method="POST"><!--add some labels-->
                            <input type="text" name="GivenName" placeholder="Given Name" ><br><br/>
                            <input type="text" name="FamilyName" placeholder="Family Name" ><br><br/>
                            <input type="text" name="Email" placeholder="Email" ><br><br/>
                            <p>Please select user type:</p>
                                <input type="radio" id="Doctor" name="user_type" value="DOCTOR" >
                                <label for="Doctor">Doctor</label><br>
                                <input type="radio" id="Researcher" name="user_type" value="RESEARCHER">
                                <label for="Researcher">Researcher</label><br>
                                <input type="radio" id="Manufacturer" name="user_type" value="MANUFACTURER">
                                <label for="Manufacturer">Manufacturer</label><br><br/>
                            <input type="text" name="Username" placeholder="Username" ><br><br/>
                            <input type="password" name="Password" placeholder="Enter Password " ><br><br/>
                            <input type="password" name="Confirm_Password" placeholder="Confirm Password " >
                            <button  name="Register" >Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php require_once($_SERVER["DOCUMENT_ROOT"]."/Capstone2/module/footer.php"); ?>