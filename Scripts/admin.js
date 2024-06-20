document.addEventListener("DOMContentLoaded", async function () {
  let admin = false;
  let users = [];
  if (uid != "") {
    await fetch(
      "http://localhost/php/Romanian-Traffic-Signs-Tutor/Public/api/users",
      { method: "GET" }
    )
      .then((res) => res.json())
      .then((res) => {
        users = [...res];
      });

    await users.map((user) => {
      if (user.id == uid) {
        if (user.admin == 1) admin = true;
      }
    });
  }
  if (admin === false) window.location.href = "home";
  else {
    // Add event listener for the submit button
    document
      .getElementById("submit-question")
      .addEventListener("click", async function (event) {
        event.preventDefault(); // Prevent the default form submission

        // Get form values
        const questionText = document
          .getElementById("question-text")
          .value.trim();
        const variant1 = document.getElementById("variant1").value.trim();
        const variant2 = document.getElementById("variant2").value.trim();
        const variant3 = document.getElementById("variant3").value.trim();
        const imageUrl = document.getElementById("img-url").value.trim();
        const correct1 = document.getElementById("variant1-check").checked
          ? 1
          : 0;
        const correct2 = document.getElementById("variant2-check").checked
          ? 1
          : 0;
        const correct3 = document.getElementById("variant3-check").checked
          ? 1
          : 0;

        // Validate inputs
        if (
          !questionText ||
          !variant1 ||
          !variant2 ||
          !variant3 ||
          (correct1 === 0 && correct2 === 0 && correct3 === 0)
        ) {
          alert(
            "Please fill all fields and select at least one correct answer."
          );
          return;
        }

        // Create the request body
        const requestBody = {
          text: questionText,
          variant_1: variant1,
          variant_2: variant2,
          variant_3: variant3,
          correct_1: correct1,
          correct_2: correct2,
          correct_3: correct3,
          image_url: imageUrl,
        };

        // Send POST request
        await fetch(
          "http://localhost/php/Romanian-Traffic-Signs-Tutor/Public/api/questions",
          {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
            body: JSON.stringify(requestBody),
          }
        )
          .then((response) => response.json())
          .then((data) => {
            if (data.message === "Question created successfully.") {
              alert("Question created successfully.");
            }
          })
          .catch((error) => {
            console.error("Error:", error);
            alert("An error occurred. Please try again.");
          });
      });

    document
      .getElementById("submit-delete-user")
      .addEventListener("click", async function (event) {
        event.preventDefault(); // Prevent the default form submission
        const userToDelete = document
          .getElementById("user-delete")
          .value.trim();
        const requestBody = {
          username: userToDelete,
        };

        if (userToDelete === "") {
          alert("You need to specify a user");
        } else {
          await fetch(
            "http://localhost/php/Romanian-Traffic-Signs-Tutor/Public/api/users",
            {
              method: "DELETE",
              headers: {
                "Content-Type": "application/json",
              },
              body: JSON.stringify(requestBody),
            }
          )
            .then((response) => response.json())
            .then((data) => {
              alert(data.message);
            })
            .catch((error) => {
              console.error("Error:", error);
              alert("An error occurred. Please try again.");
            });
        }
      });
  }
});
