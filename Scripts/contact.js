document.addEventListener("DOMContentLoaded", function () {
  document
    .getElementById("contactForm")
    .addEventListener("submit", function (event) {
      event.preventDefault();

      console.log("Form submitted");

      const subject = document.getElementById("subject").value;
      const email = document.getElementById("email").value;
      const message = document.getElementById("message").value;

      fetch(
        "http://localhost/php/Romanian-Traffic-Signs-Tutor/Public/api/contact",
        {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            subject: subject,
            email: email,
            message: message,
          }),
        }
      )
        .then((response) => response.json())
        .then((data) => {
          if (data.status === "success") {
            alert("Mesajul a fost trimis cu succes!");
          } else {
            alert("Eroare la trimiterea mesajului: " + data.message);
          }
        })
        .catch((error) => console.error("Error:", error));
    });
});
