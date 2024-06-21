let filename = "../data/intrebari.json";
fetch(filename)
  .then((response) => {
    if (!response.ok) {
      throw new Error("Network response was not ok " + response.statusText);
    }
    return response.json();
  })
  .then((data) => {
    [...data].map((item) => {
      const requestBody = {
        text: item.text,
        variant_1: item.variant_1,
        variant_2: item.variant_2,
        variant_3: item.variant_3,
        correct_1: item.correct_1,
        correct_2: item.correct_2,
        correct_3: item.correct_3,
        image_url: "",
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
