let username = document.getElementById("Username");
let erreurUsername = document.getElementById("errUser");

let password = document.getElementById("Password");
let erreurPassword = document.getElementById("errPass");

let email = document.getElementById("Email");
let erreurEmail = document.getElementById("errEmail");

let ValidePass = document.getElementById("PasswordV");
let erreurPasswordV = document.getElementById("errPassV");

let signup = document.getElementById("signup");

signup.addEventListener("submit", (e) => {
  if (checkInputs(e)) {
    let signup = e.target;

    signup.submit();
  }
});
// Username :
signup.addEventListener("click", (e) => {
  if (username.value == "") {
    e.preventDefault();
    username.setAttribute("style", "color:red; border: 1px red solid ;");
    erreurUsername.innerText = "Username is required";
    erreurUsername.setAttribute("style", "color:red;font-size: 9px;");
  } else {
    username.setAttribute("style", "color:black; border: 1px green solid ;");
    erreurUsername.innerText = "";
  }
});
// password :
signup.addEventListener("click", (e) => {
  if (password.value == "") {
    e.preventDefault();
    email.setAttribute("style", "color:red; border: 1px red solid ;");
    erreurPassword.innerText = "Password is required";
    erreurPassword.setAttribute("style", "color:red;font-size: 9px;");
  } else {
    password.setAttribute("style", "color:black; border: 1px green solid ;");
    erreurPassword.innerText = "";
  }
});

// email :
signup.addEventListener("click", (e) => {
  if (email.value == "") {
    e.preventDefault();
    email.setAttribute("style", "color:red; border: 1px red solid ;");
    erreurEmail.innerText = "Email is required";
    erreurEmail.setAttribute("style", "color:red;font-size: 9px;");
  } else {
    email.setAttribute("style", "color:black; border: 1px green solid ;");
    erreurEmail.innerText = "";
  }
});

// confirmation password (If this pwd semble A l'autre pwd):
signup.addEventListener("click", (e) => {
  if (!(ValidePass.value == password.value)) {
    e.preventDefault();
    ValidePass.setAttribute("style", "color:red; border: 1px red solid ;");
    erreurPasswordV.innerText = "Password is not the Same ! retry again";
    erreurPasswordV.setAttribute("style", "color:red;font-size:9px;");
  } else {
    ValidePass.setAttribute("style", "color:black; border: 1px green solid ;");
    erreurPasswordV.innerText = "";
  }
});
