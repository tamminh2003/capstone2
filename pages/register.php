<div class="home" >

    <div >
        <h1 >Registration Form</h1>
    </div>
    <script src="script/script.js"></script>
    <div id="DisplayDiv"></div>
    <div class="form_div">
        <form class="form" ><!--add some labels-->
            <label for="FirstName">First Name : </label>
            <input type="text" id="FirstName" name="FirstName" placeholder="First Name (Given Name)" ><br><br/>
            <label for="LastName">Last Name : </label>
            <input type="text" id="LastName" name="LastName" placeholder="Last Name (Family Name)"><br><br/>
            <label for="Email">Email : </label>
            <input type="text" id="Email" name="Email" placeholder="Email" ><br><br/>
            <p>Please select user type : </p>
            <input type="radio" id="Doctor" name="user_type" value="DOCTOR" >
            <label for="Doctor">Doctor</label><br>
            <input type="radio" id="Researcher" name="user_type" value="RESEARCHER">
            <label for="Researcher">Researcher</label><br>
            <input type="radio" id="Manufacturer" name="user_type" value="MANUFACTURER">
            <label for="Manufacturer">Manufacturer</label>
            <br><br/>
            <label for="Username">Username : </label>
            <input type="text" id="Username" name="Username" placeholder="Username" ><br><br/>
            <label for="Password">Password : </label>
            <input type="password" id="Password" name="Password" placeholder="Enter Password " ><br><br/>
            <label for="Confirm_Password">Confirm Password : </label>
            <input type="password" id="Confirm_Password" name="Confirm_Password" placeholder="Confirm Password " >
            <button  name="Register" type="button" onclick="Register_userRegister()">Register</button>
        </form>
    </div>
</div>