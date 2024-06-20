
document.addEventListener("DOMContentLoaded", function () {

    const form = document.querySelector(".forgot_password_form");
    form.addEventListener("submit", function (event) {
        event.preventDefault();

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

