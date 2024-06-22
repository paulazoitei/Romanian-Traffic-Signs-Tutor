document.addEventListener("DOMContentLoaded", async function () {
  function pickRandomQuestions(questions) {
    if (!Array.isArray(questions) || questions.length === 0) {
      console.error("Invalid input array.");
      return;
    }

    const numberOfQuestionsToPick = 26;
    const randomQuestionsSet = new Set();

    function getRandomIndex(max) {
      return Math.floor(Math.random() * max);
    }

    while (randomQuestionsSet.size < numberOfQuestionsToPick) {
      const randomIndex = getRandomIndex(questions.length);
      randomQuestionsSet.add(questions[randomIndex]);
    }

    const randomQuestionsArray = Array.from(randomQuestionsSet);
    return randomQuestionsArray;
  }

  async function play(questions) {
    let user = {};
    await fetch(
      "http://localhost/php/Romanian-Traffic-Signs-Tutor/Public/api/users/" +
        uid,
      {
        method: "GET",
      }
    )
      .then((res) => res.json())
      .then((res) => (user = res));

    let points = user.points;
    let localPoints = 0.0;
    let wrongQuestionPoints = -0.5;
    let correctQuestionPoints = 0.5;
    let failedLimit = 5; // Maximum of wrong answers
    let failedQuizPoints = -5;
    let successQuizPoints = 10;
    let fullSuccessQuizPoints = 20; // In case of wrong answers is 0
    let correctAnswers = 0;
    let wrongAnswers = 0;
    let remainingQuestions = questions.length;
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
        points += wrongQuestionPoints;
        localPoints += -0.5;
        wrongAnswers++;
      } else {
        points += correctQuestionPoints;
        localPoints += 0.5;
        correctAnswers++;
      }
      const requestBody = {
        points: points * 1.0,
        quiz_successes: user.quiz_successes,
        quiz_fails: user.quiz_fails,
      };
      fetch(
        "http://localhost/php/Romanian-Traffic-Signs-Tutor/Public/api/users/" +
          uid,
        {
          method: "PUT",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(requestBody),
        }
      ).then((res) => console.log(res));
      remainingQuestions--;
    }

    function updateScore() {
      const correctSpan = document.querySelectorAll(".information")[0];
      const wrongSpan = document.querySelectorAll(".information")[1];
      const remainingSpan = document.querySelectorAll(".information")[2];

      correctSpan.textContent = `Intrebari corecte: ${correctAnswers}`;
      wrongSpan.textContent = `Intrebari gresite: ${wrongAnswers}`;
      remainingSpan.textContent = `Intrebari ramase: ${remainingQuestions}`;
    }

    function checkEndGame() {
      if (wrongAnswers >= failedLimit) {
        console.log(`Ai picat cu un punctaj de ${points}.`);
        localPoints += failedQuizPoints;
        const requestBody = {
          points: points * 1.0 - 5,
          quiz_successes: user.quiz_successes,
          quiz_fails: user.quiz_fails + 1,
        };
        fetch(
          "http://localhost/php/Romanian-Traffic-Signs-Tutor/Public/api/users/" +
            uid,
          {
            method: "PUT",
            headers: {
              "Content-Type": "application/json",
            },
            body: JSON.stringify(requestBody),
          }
        )
          .then((res) => console.log(res))
          .then(() => {
            localStorage.setItem("points", String(localPoints));

            window.location.href = "fail";
          });

        return true;
      }

      if (remainingQuestions === 0) {
        console.log(`Ai admis cu un punctaj de ${points}.`);
        localPoints += successQuizPoints;
        let requestBody = {
          points: points * 1.0 + 10,
          quiz_successes: user.quiz_successes + 1,
          quiz_fails: user.quiz_fails,
        };
        if (correctAnswers === 26) {
          localPoints += 10;
          requestBody = {
            points: points * 1.0 + 20,
            quiz_successes: user.quiz_successes + 1,
            quiz_fails: user.quiz_fails,
          };
        }
        fetch(
          "http://localhost/php/Romanian-Traffic-Signs-Tutor/Public/api/users/" +
            uid,
          {
            method: "PUT",
            headers: {
              "Content-Type": "application/json",
            },
            body: JSON.stringify(requestBody),
          }
        )
          .then((res) => console.log(res))
          .then(() => {
            localStorage.setItem("points", String(localPoints));

            window.location.href = "success";
          })
          .catch((err) => console.log(err));

        return true;
      }

      return false;
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

      if (!checkEndGame()) {
        currentQuestionIndex++;
        if (currentQuestionIndex < questions.length) {
          displayQuestion(questions[currentQuestionIndex]);
        }
      } else {
        console.log(`Scor final: ${points}`);
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
      questions = pickRandomQuestions(res);
      play(questions);
    })
    .catch((err) => console.error("Error: " + err));
});
