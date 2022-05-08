function Register_userRegister() {

    function nameCharCheck(str) {
        const basicCheck = /^[a-zA-Z]*$/;
        return basicCheck.test(str);
    }

    function emailCharCheck(emi) {
        const advCheck = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; ///^([a-z0-9_\-]+)(\.[a-z0-9_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/;
        return advCheck.test(emi);
    }

    function pwdCharCheck(pwd) {
        const specialCheck = /^(?=.*\d)(?=.*[@#\-_$%^&+=§!])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!]+$/;
        return specialCheck.test(pwd);
    }

    function usernameCharCheck(username) {
        const userCheck = /^[a-zA-Z0-9_]+$/;
        return userCheck.test(username);
    }

    function userCompanyCharCheck(company) {
        const userCompanyCheck = /^[a-zA-Z0-9_]+$/;
        return userCompanyCheck.test(company);
    }

    if (!document.querySelector("#FirstName").value) {
        alert("First name is empty")
        return;
    }
    let userRegisterCheck_FirstName = document.querySelector("#FirstName").value;
    if (!nameCharCheck(userRegisterCheck_FirstName)) {
        alert("First name has forbidden character")
        return;
    }


    if (!document.querySelector("#LastName").value) {
        alert("Last name is empty")
        return;
    }
    let userRegisterCheck_LastName = document.querySelector("#LastName").value;
    if (!nameCharCheck(userRegisterCheck_LastName)) {
        alert("Last name has forbidden character")
        return;
    }

    if (!document.querySelector("#Company").value) {
        alert("Company field is empty")
        return;
    }
    let userRegisterCheck_Company = document.querySelector("#Company").value;
    if (!userCompanyCharCheck(userRegisterCheck_Company)) {
        alert("Company name has forbidden characters")
        return;
    }


    if (!document.querySelector("#Email").value) {
        alert("Email is empty")
        return;
    }
    let userRegisterCheck_Email = document.querySelector("#Email").value;
    if (!emailCharCheck(userRegisterCheck_Email)) {
        alert("Invalid email format")
        return;
    }

    let userRegisterCheck_UserType
    if (document.querySelector("#Doctor").checked) {
        userRegisterCheck_UserType = "DOCTOR";
    }
    else if (document.querySelector("#Researcher").checked) {
        userRegisterCheck_UserType = "RESEARCHER";
    }
    else if (document.querySelector("#Manufacturer").checked) {
        userRegisterCheck_UserType = "MANUFACTURER";
    }
    else {
        alert("User type is empty")
        return;
    }


    if (!document.querySelector("#Username").value) {
        alert("Username is empty")
        return;
    }
    let userRegisterCheck_Username = document.querySelector("#Username").value;
    if (!usernameCharCheck(userRegisterCheck_Username)) {
        alert("Username has forbidden characters")
        return;
    }


    if (!document.querySelector("#Password").value) {
        alert("Password is empty")
        return;
    }
    let userRegisterCheck_Password = document.querySelector("#Password").value;
    if (userRegisterCheck_Password.length < 6 || userRegisterCheck_Password.length > 100) {
        alert("Password size out of bounds.\nCHARACTER LIMITS:\nMIN : 6\nMAX : 100")
        return;
    }
    if (!pwdCharCheck(userRegisterCheck_Password)) {
        alert("Password does not contain special characters")
        return;
    }


    if (!document.querySelector("#Confirm_Password").value) {
        alert("Password confirmation is empty")
        return;
    }
    let userRegisterCheck_ConfirmPassword = document.querySelector("#Confirm_Password").value;
    if (userRegisterCheck_Password != userRegisterCheck_ConfirmPassword) {
        alert("Password and confirmation do not match")
        return;
    }


    let userRegister_FormData = new FormData();
    userRegister_FormData.append("RegisterFirstName", userRegisterCheck_FirstName);
    userRegister_FormData.append("RegisterLastName", userRegisterCheck_LastName);
    userRegister_FormData.append("RegisterEmail", userRegisterCheck_Email);
    userRegister_FormData.append("RegisterUserType", userRegisterCheck_UserType);
    userRegister_FormData.append("RegisterUsername", userRegisterCheck_Username);
    userRegister_FormData.append("RegisterPassword", userRegisterCheck_Password);
    userRegister_FormData.append("RegisterCompany", userRegisterCheck_Company);

    fetch("/controller/register.php", {
        method: "POST",
        body: userRegister_FormData
    })
        .then(response => response.text())
        .then(text => {
            if (text == 'SUCCESS') {
                document.querySelector("#DisplayDiv").innerHTML =
                    "You have successfully registered your account. " +
                    "Proceed to the Login page to login to system."
            }
            else if (text == 'DOUBLE_JEOPARDY') {
                document.querySelector("#DisplayDiv").innerHTML =
                    "You can only have 1 account registered for every email address."
            }
            else if (text == 'USERNAME') {
                document.querySelector("#DisplayDiv").innerHTML =
                    "Username already taken. Please create a different one that works."
            }
        })
}

function Login_userVerif(event) {
    event.preventDefault();

    let userVerif_Username
    if (document.querySelector("#Username").value) {
        userVerif_Username = document.querySelector("#Username").value;
    }
    else {
        alert("Username is empty")
        return;
    }
    let userVerif_Password
    if (document.querySelector("#Password").value) {
        userVerif_Password = document.querySelector("#Password").value;
    }
    else {
        alert("Password is empty")
        return;
    }

    userVerif_FormData = new FormData();
    userVerif_FormData.append('processUsername', userVerif_Username);
    userVerif_FormData.append('processPassword', userVerif_Password);

    fetch("/controller/login.php", {
        method: "POST",
        body: userVerif_FormData
    })
        .then(response => response.text())
        .then(text => {
            if (text == 'verified') window.location.assign("/pages/Dashboard.php")
            else if (text == 'Fail') document.querySelector("#DisplayDiv").innerHTML = "Username and Password incorrect"
        })
}

function DeviceAdd_handleSubmit(e) {
    e.preventDefault();
    const form = e.target;
    let formData = new FormData(form);

    fetch("/controller/manufacturer/deviceAdd.php", {
        method: "POST",
        body: formData
    })
        .then(response => {
            if (response.headers.has('Content-Type') && response.headers.get('Content-Type') == 'application/json') {
                return response.json();
            }
            if ((response.headers.has('Content-Type') && response.headers.get('Content-Type') == 'text/plain')) {
                return response.text();
            }
        })
        .then(data => {
            if (typeof data === 'object') {
                console.log("Device successfully added");
                console.log(data.deviceId);
                window.location.assign(`/pages/Device.php?device_id=${data.deviceId}`)
            }
            else {
                console.log(data);
            }
        });
}

function DeviceList_handleUpdate(element) {
    location.assign(`/pages/Manufacturer/DeviceUpdate.php?device_id=${element.dataset.id}`);
}

function DeviceList_handleDetails(element) {
    location.assign(`/pages/Device.php?device_id=${element.dataset.id}`)
}

function DeviceList_handleDelete(element) {
    confirm("Please confirm you want to delete this device:");
    let id = element.dataset.id;
    let form = new FormData();
    form.append("id", id);
    document.querySelector(".loader-container").style.visibility = "visible";

    fetch('/controller/manufacturer/deviceDelete.php', {
        method: "POST",
        body: form
    })
        .then(reponse => reponse.text())
        .then(text => {
            if (text == 'success') location.reload();
            else if (text == 'fail') alert('Something went wrong, cannot delete record');
        });
}

function DeviceUpdate_handleSubmit(event) {
    event.preventDefault();
    const form = event.target;
    let formData = new FormData(form);
    document.querySelector(".loader-container").style.visibility = "visible";

    fetch("/controller/manufacturer/deviceUpdate.php", {
        method: "POST",
        body: formData
    })
        .then(response => {
            if (response.headers.has('Content-Type') && response.headers.get('Content-Type') == 'application/json') {
                return response.json();
            }
            if ((response.headers.has('Content-Type') && response.headers.get('Content-Type') == 'text/plain')) {
                return response.text();
            }
        })
        .then(data => {
            if (typeof data === 'object') {
                console.log("Device successfully updated");
                window.location = `/pages/Manufacturer/Device.php?device_id=${data.deviceId}`
            }
            else {
                console.log(data);
            }
        });
}
function Document_View(element) {
    location.assign(`/pages/Document.php?docId=${element.dataset.id}`);
}
function Home_Redirect() {
    location.assign("/pages/Dashboard.php");
}
function DocList_Redirect() {
    location.assign("/pages/Manufacturer/DocumentList.php");
}

function DocumentUpload_handleSubmit(event) {
    event.preventDefault();
    const form = event.target;
    let deviceId = (new URLSearchParams(location.search)).get("device_id");
    let formData = new FormData(form);
    form.querySelectorAll("input").forEach(e => { e.disabled = true });
    document.querySelector(".loader-container").style.visibility = "visible";

    fetch("/controller/manufacturer/documentAdd.php", { "method": "POST", "body": formData })
        .then(response => response.text())
        .then(text => { if (text == "success") location.assign(`/pages/Device.php?device_id=${deviceId}`) });

}

function manuDev_handleDocDel(element) {
    confirm("Please confirm you want to delete this document:");
    let id = element.dataset.id;
    let form = new FormData();

    form.append("id", id);
    document.querySelector(".loader-container").style.visibility = "visible";
    fetch('/controller/manufacturer/documentDelete.php', {
        method: "POST",
        body: form
    })
        .then(reponse => reponse.text())
        .then(text => {
            if (text == 'success') location.reload();
            else if (text == 'fail') alert('Something went wrong, cannot delete record');
        });
}

function manuDev_handleImgSelect(element) {
    confirm("Please confirm you want to select this image as thumbnail:");

    let imageId = element.dataset.id;
    let deviceId = (new URLSearchParams(location.search)).get("device_id");

    let form = new FormData();
    form.append("imageId", imageId);
    form.append("deviceId", deviceId);

    document.querySelector(".loader-container").style.visibility = "visible";

    fetch('/controller/manufacturer/selectImage.php', {
        method: "POST",
        body: form
    })
        .then(reponse => reponse.text())
        .then(text => {
            if (text == 'success') location.reload();
            else if (text == 'fail') alert('Something went wrong, cannot delete record');
        });
}

function ReseacherDocumentUpload_handleSubmit(event) {
    event.preventDefault();
    const form = event.target;
    let formData = new FormData(form);
    form.querySelectorAll("input").forEach(e => { e.disabled = true });

    document.querySelector(".loader-container").style.visibility = "visible";

    fetch("/controller/researcher/documentAdd.php", { "method": "POST", "body": formData })
        .then(response => response.text())
        .then(text => { if (text == "success") location.assign(`/pages/Researcher/DeviceList.php`) });

}

function ResearcherDeviceList_handleDetails(element) {
    location.assign(`/pages/Researcher/Device.php?device_id=${element.dataset.id}`)
}

function researchDev_handleDocDel(element) {
    confirm("Please confirm you want to delete this pt:");
    let id = element.dataset.id;
    let form = new FormData();

    form.append("id", id);
    document.querySelector(".loader-container").style.visibility = "visible";
    fetch('/controller/researcher/documentDelete.php', {
        method: "POST",
        body: form
    })
        .then(reponse => reponse.text())
        .then(text => {
            if (text == 'success') location.reload();
            else if (text == 'fail') alert('Something went wrong, cannot delete record');
        });
}