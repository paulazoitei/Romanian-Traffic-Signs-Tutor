document.addEventListener("DOMContentLoaded", () => {
  let points = localStorage.getItem("points");
  let score = document.getElementById("score");

  score.innerHTML = "Scor final: " + points;
});
