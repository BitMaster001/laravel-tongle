var  formSwitchs = document.getElementsByClassName("form-switch");
for(let i = 0; i < formSwitchs.length; i++) {
    formSwitchs[i].addEventListener("click", function() {
        if(this.classList.contains('active')){
            this.querySelector("input[type=checkbox]").checked = true;
        }else{
            this.querySelector("input[type=checkbox]").checked = false;
        }
    });
}
