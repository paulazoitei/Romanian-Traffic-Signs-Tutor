
document.getElementById("register-form").addEventListener("submit", function (event) {
    event.preventDefault();

    let hasError = false;

    const username = document.getElementById("register-username").value.trim();
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("register-password").value.trim();
    const confirmPassword = document.getElementById("confirm-password").value.trim();
    const phone = document.getElementById("phone").value.trim();

    const errorContainer1 = document.getElementById("username-error-container");
    const errorContainer2 = document.getElementById("email-error-container");


    document.getElementById("username-error").innerHTML = "";
    document.getElementById("email-error").innerHTML = "";
    document.getElementById("password-error").innerHTML = "";
    document.getElementById("confirm-password-error").innerHTML = "";
    document.getElementById("phone-error").innerHTML = "";
    errorContainer1.innerHTML = "";
    errorContainer2.innerHTML = "";


    if (!username) {
        document.getElementById("username-error").innerHTML = "Username is required.";
        hasError = true;
    }

    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        document.getElementById("email-error").innerHTML = "Valid email is required.";
        hasError = true;
    }

    const passwordPattern = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    if (!passwordPattern.test(password)) {
        document.getElementById("password-error").innerHTML = "Your password is not complex enough, it must contain at least 8 characters, at least one uppercase letter, one lowercase letter, one number, and one special character.";
        hasError = true;
    }

    if (password !== confirmPassword) {
        document.getElementById("confirm-password-error").innerHTML = "Passwords must match.";
        hasError = true;
    }

    const phonePattern = /^\+?\d{10,15}$/;
    if (!phonePattern.test(phone)) {
        document.getElementById("phone-error").innerHTML = "Invalid phone number.";
        hasError = true;
    }

    if (!hasError) {
        const formData = {
            username: username,
            email: email,
            password: password,
            password_confirmation: confirmPassword,
            phone: phone
        };

        fetch('http://localhost/php/Romanian-Traffic-Signs-Tutor/Public/api/register', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(formData)
        })
            .then(response => response.json().then(data => ({status: response.status, body: data})))
            .then(data => {
                if (data.status === 409) {
                    if (data.body.error === "Username already exists.") {
                        errorContainer1.innerHTML = "Username already exists.";
                    } else if (data.body.error === "Email already exists.") {
                        errorContainer2.innerHTML = "Email already exists.";
                    } else {
                        displayError("An unexpected error occurred.");
                    }
                } else if (data.status === 500) {
                    displayError("An unexpected error occurred.");
                } else {
                    alert("User registered successfully!");
                    // window.location.href = '/php/Romanian-Traffic-Signs-Tutor/Public/profil';
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
});

function displayError(message) {
    const errorContainer = document.querySelector('.error-message');
    errorContainer.textContent = message;
    errorContainer.style.display = 'block';
}