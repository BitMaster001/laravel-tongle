var path = window.location.pathname;
if(path === "/login"){
    document.getElementById("login-button").classList.add("active");
}else if(path === "/register"){
    document.getElementById("register-button").classList.add("active");
}
var loginButton = document.getElementById("login-button");
if (loginButton !== null){
    loginButton.addEventListener("click", function(){ if(!this.classList.contains('active')) window.open("/login","_self"); });
}
var registerButton = document.getElementById("register-button");
if (registerButton !== null){
    registerButton.addEventListener("click", function(){ if(!this.classList.contains('active')) window.open("/register","_self"); });
}
var alertClose = document.getElementById("alert-close");
if (alertClose !== null){
    alertClose.addEventListener("click", function(){ this.parentNode.style.display='none' });
}
