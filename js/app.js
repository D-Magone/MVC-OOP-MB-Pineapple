window.onload = function () {

    let btn = document.getElementById("subscribeBtn");
    let input = document.getElementById("inputField");
    let error = document.getElementById("errorMsg");

    input.onchange = function() {

        let email = document.getElementById("inputField").value;
        console.log(email);
        error.innerHTML = "";
        const expresion = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        
        if(!expresion.test(String(email).toLowerCase())) {
            error.innerHTML = "Please provide a valid e-mail address";
        } else if (email.slice(email.length - 3) == ".co") {
            error.innerHTML = "We are not accepting subscriptions from Colombia emails";
        }else if (!this.form.checkbox.checked) {
            error.innerHTML = "You must accept the terms and conditions";
        } else if (email <= 0) {
            error.innerHTML = "Email address is required";
        } else {
            error.innerHTML = "";
            
        }
    }
}