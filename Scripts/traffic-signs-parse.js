document.addEventListener("DOMContentLoaded", function () {
  var path = window.location.pathname;
  var page = path.split("/").pop();
  page = page.replace(/_/g, "-");
  page = page.concat(".json");
  console.log(page);
  let signs = document.getElementById("sign-container");

  let data = [];
  fetch("../data/" + page)
    .then((response) => {
      if (!response.ok) {
        throw new Error("Network response was not ok " + response.statusText);
      }
      return response.json();
    })
    .then((data) => {
      console.log(data);
      data.map((entry) => {
        let child = document.createElement("div");
        child.className = "sign";
        let image = document.createElement("img");
        let title = document.createElement("h3");
        let description = document.createElement("p");
        description.innerHTML = entry.description;
        title.innerHTML = entry.title;
        image.src = entry.url;
        child.appendChild(image);
        child.appendChild(title);
        child.appendChild(description);
        signs.appendChild(child);

        child.addEventListener("click", function () {
          child.classList.toggle("expanded");
        });
      });
    });
});
