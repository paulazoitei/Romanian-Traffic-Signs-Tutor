document.addEventListener("DOMContentLoaded", async function () {
  let users = [];
  await fetch(
    "http://localhost/php/Romanian-Traffic-Signs-Tutor/Public/api/users",
    {
      method: "GET",
    }
  )
    .then((res) => res.json())
    .then((res) => {
      users = res;
      //users.sort((a, b) => b.points - a.points);
    });

  users.sort((a, b) => b.points - a.points);
  let container = document.getElementById("top");
  let index = 1;
  let maxEntries = 20;
  users.forEach((user) => {
    if (index > maxEntries) return;
    let entry = document.createElement("div");
    entry.className = "entry";
    let points = document.createElement("p");

    let username = document.createElement("p");
    let place = document.createElement("p");
    if (user.id == uid) {
      username.innerText = user.username + " (you)";
    } else username.innerText = user.username;
    place.innerText = index;
    if (user.points != null) points.innerText = user.points;
    else points.innerText = 0;

    entry.appendChild(place);
    entry.appendChild(username);
    entry.appendChild(points);
    container.appendChild(entry);
    index++;
  });
  console.log(uid);
  console.log(users);
});
