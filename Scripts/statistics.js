document.addEventListener("DOMContentLoaded", function () {
  fetch(
    "http://localhost/php/Romanian-Traffic-Signs-Tutor/Public/api/statistics",
    {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
      },
    }
  )
    .then((response) => response.json())
    .then((data) => {
      if (data.error) {
        alert(data.error);
      } else {
        // Actualizează elementele HTML cu datele reale
        document.getElementById("total-users").textContent = data.totalUsers;
        document.getElementById("total-admins").textContent = data.totalAdmins;
        document.getElementById("total-points").textContent = data.totalPoints;
        document.getElementById("quiz-success-rate").textContent =
          data.quizSuccessRate + "%";
        document.getElementById("number-of-questions").textContent =
          data.numberOfQuestions;
        document.getElementById("number-of-max-rank").textContent=
            data.numberMaxRank;
      }
    })
    .catch((error) => {
      console.error("Error:", error);
    });
});
