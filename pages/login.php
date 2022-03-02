<div class="card-title bg-primary text-white mt-5">
    <h1 class="text-center py-2">Login Form</h1>
</div>
<script src="script/script.js"></script>
<div id="DisplayDiv" style="color:red; font-weight:bold"></div>
<div class="card-body">

    <form>
        <input type="text" id="Username" placeholder="Username" class="form-control my-2" value="<?php if(isset($UserName)) echo $UserName;?>" required>
        <input type="password" id="Password" placeholder="Password" class="form-control mb-3"  value="<?php if(isset($Password)) echo $Password;?>" required>
        <button type="button" class="btn btn-success" name="login" class="pt-3" onclick="Login_userVerif()">Login</button>
    </form>

</div>
