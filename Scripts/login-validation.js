document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector(".login-form");
  const username = document.getElementById("username");
  const password = document.getElementById("password");
  const usernameError = document.getElementById("login-username-error");
  const passwordError = document.getElementById("login-password-error");

  form.addEventListener("submit", function (event) {
    event.preventDefault();

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
        .then((response) => response.json())
        .then((data) => {
          if (data.error) {
            if (data.error.includes("Username")) {
              usernameError.innerHTML = data.error;
            } else if (data.error.includes("Password")) {
              passwordError.innerHTML = data.error;
            }
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
