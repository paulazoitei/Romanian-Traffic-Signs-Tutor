document.addEventListener("DOMContentLoaded", function () {
  let questions = document.getElementsByClassName("faq-item");

  for (let i = 0; i < questions.length; i++) {
    let question = questions[i];

    question.addEventListener("click", function () {
      question.active = question.active === "true" ? "false" : "true";

      let answer = question.querySelector(".answer");

      if (question.active === "true") {
        answer.style.visibility = "visible";
        answer.style.position = "relative";
      } else {
        answer.style.visibility = "hidden";
        answer.style.position = "absolute";
      }
    });
  }
});
