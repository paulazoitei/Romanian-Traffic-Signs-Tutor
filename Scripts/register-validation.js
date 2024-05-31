document
  .getElementById("register-form")
  .addEventListener("submit", function (event) {
    let hasError = false;

    const username = document.getElementById("register-username").value.trim();
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("register-password").value.trim();
    const confirmPassword = document
      .getElementById("confirm-password")
      .value.trim();
    const phone = document.getElementById("phone").value.trim();

    document.getElementById("username-error").innerHTML = "";
    document.getElementById("email-error").innerHTML = "";
    document.getElementById("password-error").innerHTML = "";
    document.getElementById("confirm-password-error").innerHTML = "";
    document.getElementById("phone-error").innerHTML = "";

    if (!username) {
      document.getElementById("username-error").innerHTML =
        "Username is required.";
      hasError = true;
    }

    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
      document.getElementById("email-error").innerHTML =
        "Valid email is required.";
      hasError = true;
    }

    const passwordPattern =
      /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    if (!passwordPattern.test(password)) {
      document.getElementById("password-error").innerHTML =
        "Your password is not complex enough, it must contain at least 8 characters, at least one uppercase letter, one lowercase letter, one number, and one special character.";
      hasError = true;
    }

    if (password !== confirmPassword) {
      document.getElementById("confirm-password-error").innerHTML =
        "Passwords must match.";
      hasError = true;
    }

    const phonePattern = /^\+?\d{10,15}$/;
    if (!phonePattern.test(phone)) {
      document.getElementById("phone-error").innerHTML =
        "Invalid phone number.";
      hasError = true;
    }

    if (hasError) {
      event.preventDefault();
    }
  });
