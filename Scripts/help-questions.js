document.addEventListener("DOMContentLoaded", function () {
  let questions = document.getElementsByClassName("faq-item");

  for (let i = 0; i < questions.length; i++) {
    let question = questions[i];
    let questionMain = question.querySelector(".question");
    let answer = question.querySelector(".answer");
    function clickEvent() {
      question.isactive = question.isactive === "true" ? "false" : "true";

      if (question.isactive === "true") {
        answer.style.visibility = "visible";
        answer.style.position = "relative";
        answer.style.display = "block";
      } else {
        answer.style.visibility = "hidden";
        answer.style.position = "absolute";
        answer.style.display = "none";
      }
    }
    questionMain.addEventListener("click", clickEvent);
    answer.addEventListener("click", clickEvent);
  }
});
