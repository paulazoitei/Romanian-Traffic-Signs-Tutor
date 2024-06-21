//let filename = "../data/trecere-cale-ferata.json";
let filenames = [
  "avertizare",

  "borne-kilometrice",
  "informare",
  "informare-turistica",
  "interzicere",
  "lucrari",
  "marcaje-diverse",
  "marcaje-laterale",
  "marcaje-longitudinale",
  "marcaje-transversale",
  "mijloace-auxiliare",
  "obligare",
  "orientare",
  "prioritate",
  "semnale-luminoase",
  "semnale-politist",
  "trecere-cale-ferata",
];
filenames.map((file) => {
  let filename = "../data/" + file + ".json";
  let questionTitle = "Care este semnificația acestui semn?";
  const chooseAnswer = (data) => {
    let len = data.length;
    let random = Math.floor(Math.random() * len);
    return data[random];
  };
  fetch(filename)
    .then((response) => {
      if (!response.ok) {
        throw new Error("Network response was not ok " + response.statusText);
      }
      return response.json();
    })
    .then((data) => {
      [...data].map((sign) => {
        let imgUrl = sign.url;
        let correctAnswer = sign.title;

        let wrongAnswer1 = {};
        let wrongAnswer2 = {};
        do {
          wrongAnswer1 = chooseAnswer(data);
          wrongAnswer2 = chooseAnswer(data);
        } while (
          sign.title === wrongAnswer1.title ||
          wrongAnswer1.title === wrongAnswer2.title ||
          sign.title === wrongAnswer2.title
        );
        let placedwr1 = false;
        let randomPlacement = Math.floor(Math.random() * 3);
        let correct = [0, 0, 0];
        let questionCorrect = ["", "", ""];
        correct[randomPlacement] = 1;
        questionCorrect[randomPlacement] = correctAnswer;
        // console.log(correct);
        // console.log(questionCorrect);
        for (let i = 0; i < 3; i++) {
          if (questionCorrect[i] === "") {
            if (placedwr1 === false) {
              questionCorrect[i] = wrongAnswer1.title;
              placedwr1 = true;
            } else questionCorrect[i] = wrongAnswer2.title;
          }
        }
        const requestBody = {
          text: questionTitle,
          variant_1: questionCorrect[0],
          variant_2: questionCorrect[1],
          variant_3: questionCorrect[2],
          correct_1: correct[0],
          correct_2: correct[1],
          correct_3: correct[2],
          image_url: imgUrl,
        };
        fetch(
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
              console.log("Question created!");
            }
          })
          .catch((error) => {
            console.error("Error:", error);
          });
      });
    });
});
