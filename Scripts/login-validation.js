document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector(".login-form");
    const username = document.getElementById("username");
    const password = document.getElementById("password");
    const usernameError = document.getElementById("login-username-error");
    const passwordError = document.getElementById("login-password-error");

    form.addEventListener("submit", function (event) {
        let valid = true;
        usernameError.innerHTML = "";
        passwordError.innerHTML = "";

        if (username.value.trim() === "") {
            usernameError.innerHTML = "Username is required!";
            valid = false;
        }

        if (password.value.trim() === "") {
            passwordError.innerHTML = "Password is required!";
            valid = false;
        }

        if (!valid) {
            event.preventDefault();
        }
    });
});