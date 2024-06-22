


document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector(".login-form");
    const username = document.getElementById("username");
    const password = document.getElementById("password");
    const errorContainer = document.getElementById("login-error-container");

    form.addEventListener("submit", function (event) {
        event.preventDefault();

        let valid = true;
        errorContainer.innerHTML = "";

        if (username.value.trim() === "") {
            errorContainer.innerHTML += "Username is required!<br>";
            valid = false;
        }

        if (password.value.trim() === "") {
            errorContainer.innerHTML += "Password is required!<br>";
            valid = false;
        }

        if (valid) {
            const data = {
                username: username.value.trim(),
                password: password.value.trim(),
            };

            fetch(
                "http://localhost/php/Romanian-Traffic-Signs-Tutor/Public/api/login",
                {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify(data),
                }
            )
                .then((response) => response.json().then(data => ({status: response.status, body: data})))
                .then((data) => {
                    if (data.status === 401) {
                        errorContainer.innerHTML = "Username or password are incorrect!";
                    } else if (data.body.error) {
                        errorContainer.innerHTML = data.body.error;
                    } else {
                        // sessionStorage.setItem("auth_token", data.token);
                        alert("Logged in!");

                        window.location.href =
                            "/php/Romanian-Traffic-Signs-Tutor/Public/profil";
                    }
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
        }
    });
});


