
document.addEventListener("DOMContentLoaded", function () {
    console.log("JavaScript loaded");  // Debug message to ensure JS is loaded
    const form = document.querySelector(".forgot_password_form");
    form.addEventListener("submit", function (event) {
        event.preventDefault();
        console.log("Form submitted");  // Debug message to ensure event is triggered
        const email = document.getElementById("email").value.trim();

        if (email === "") {
            alert("Email is required!");
            return;
        }

        fetch('http://localhost/php/Romanian-Traffic-Signs-Tutor/Public/api/forgot_password', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ email: email })
        })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert(data.error);
                } else {
                    alert(data.success);

                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
});

