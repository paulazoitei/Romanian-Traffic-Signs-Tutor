document.addEventListener("DOMContentLoaded", async function () {
  function shuffleQuestions(questions) {
    for (let i = questions.length - 1; i > 0; i--) {
      const j = Math.floor(Math.random() * (i + 1));

      [questions[i], questions[j]] = [questions[j], questions[i]];
    }
    return questions;
  }

  async function play(questions) {
    let correctAnswers = 0;
    let wrongAnswers = 0;

    let originalColor = "rgb(33, 177, 193)";
    const questionContainer = document.querySelector(".question-container");
    const sendButton = document.querySelector(".send");
    const checkboxInputs = document.querySelectorAll("input[type='checkbox']");

    let variant1 = document.getElementById("v1cont");
    let variant2 = document.getElementById("v2cont");
    let variant3 = document.getElementById("v3cont");
    let v1check = document.getElementById("variant1");
    let v2check = document.getElementById("variant2");
    let v3check = document.getElementById("variant3");
    let currentQuestionIndex = 0;

    function displayQuestion(question) {
      const questionText = document.querySelector(".question-text p");
      const questionImage = document.querySelector(".q-image");
      const variantLabels = document.querySelectorAll(".variant");

      checkboxInputs.forEach((checkbox, index) => {
        checkbox.checked = false;
        // Reset background color according to the checkbox state
        if (index === 0) {
          variant1.style.backgroundColor = originalColor;
        } else if (index === 1) {
          variant2.style.backgroundColor = originalColor;
        } else if (index === 2) {
          variant3.style.backgroundColor = originalColor;
        }
      });

      questionText.textContent = question.text;
      if (question.image_url === "")
        questionImage.src = ".././Assets/Images/question-image.jpg";
      else questionImage.src = question.image_url;

      variantLabels[0].innerHTML = question.variant_1;
      variantLabels[1].innerHTML = question.variant_2;
      variantLabels[2].innerHTML = question.variant_3;
    }

    function evaluateAnswer(question, selectedAnswers) {
      let correctAnswerFound = true;

      if (
        (question.correct_1 == 0 && selectedAnswers.includes("variant1")) ||
        (question.correct_1 == 1 && !selectedAnswers.includes("variant1")) ||
        (question.correct_2 == 0 && selectedAnswers.includes("variant2")) ||
        (question.correct_2 == 1 && !selectedAnswers.includes("variant2")) ||
        (question.correct_3 == 0 && selectedAnswers.includes("variant3")) ||
        (question.correct_3 == 1 && !selectedAnswers.includes("variant3"))
      ) {
        correctAnswerFound = false;
      }
      if (!correctAnswerFound) {
        wrongAnswers++;
      } else {
        correctAnswers++;
      }
    }

    function updateScore() {
      const correctSpan = document.querySelectorAll(".information")[0];
      const wrongSpan = document.querySelectorAll(".information")[1];

      correctSpan.textContent = `Intrebari corecte: ${correctAnswers}`;
      wrongSpan.textContent = `Intrebari gresite: ${wrongAnswers}`;
    }

    sendButton.addEventListener("click", function (event) {
      event.preventDefault();

      let selectedAnswers = [];
      checkboxInputs.forEach((checkbox) => {
        if (checkbox.checked) {
          selectedAnswers.push(checkbox.id);
        }
      });

      if (selectedAnswers.length === 0) {
        alert("Selectează cel puțin o variantă de răspuns.");
        return;
      }

      evaluateAnswer(questions[currentQuestionIndex], selectedAnswers);
      updateScore();

      currentQuestionIndex++;
      if (currentQuestionIndex < questions.length) {
        displayQuestion(questions[currentQuestionIndex]);
      }
    });

    updateScore();
    displayQuestion(questions[currentQuestionIndex]);
  }

  let questions = [];

  await fetch(
    "http://localhost/php/Romanian-Traffic-Signs-Tutor/Public/api/questions",
    { method: "GET" }
  )
    .then((res) => res.json())
    .then((res) => {
      questions = shuffleQuestions(res);
      play(questions);
    })
    .catch((err) => console.error("Error: " + err));
});
