//  <p id="username" class="username"><?php echo $_SESSION['username']; ?></p>
//           <p id="rank" class="rank">Incepator</p>
//           <p id="points" class="points">Puncte: 0</p>
//           <p id="points-until-next-rank" class="remaining">Puncte ramase pana la urmatorul rank : 50</p>
//           <p id="successes" class="admise">Total chestionare admise: 0</p>
//           <p id="fails" class="picate">Total chestionare picate: 0</p>
document.addEventListener("DOMContentLoaded", async () => {
  const ranks = [
    {
      name: "Începător",
      required: -1000000,
      color: "#62ff54",
    },
    {
      name: "Învățăcel",
      required: 20,
      color: "#a8fa34",
    },
    {
      name: "Intermediar",
      required: 70,
      color: "#34fabf",
    },
    {
      name: "Priceput",
      required: 150,
      color: "#fa9e34",
    },
    {
      name: "Avansat",
      required: 250,
      color: "#fa4534",
    },
    {
      name: "Extraordinar",
      required: 400,
      color: "#ff00a2",
    },
    {
      name: "Super talentat",
      required: 600,
      color: "#b300ff",
    },
    {
      name: "The Expert",
      required: 900,
      color: "#6c76d4",
    },
    {
      name: "Profesor de legislație",
      required: 1500,
      color: "#e8ca79",
    },
    {
      name: "Chestor principal",
      required: 3000,
      color: "#0400ff",
    },
  ];
  const username = document.getElementById("username");
  const rank = document.getElementById("rank");
  const userpoints = document.getElementById("points");
  const punr = document.getElementById("points-until-next-rank");
  const successes = document.getElementById("successes");
  const fails = document.getElementById("fails");
  const place = document.getElementById("place");
  let userData = {};
  let allUsers = [];
  await fetch(
    "http://localhost/php/Romanian-Traffic-Signs-Tutor/Public/api/users"
  )
    .then((res) => res.json())
    .then((res) => (allUsers = res));
  await fetch(
    "http://localhost/php/Romanian-Traffic-Signs-Tutor/Public/api/users/" + uid,
    { method: "GET" }
  )
    .then((res) => res.json())
    .then((res) => {
      userData = res;
      if (userData.admin == "1")
        username.innerText = username.innerText + " (Admin)";
      userpoints.innerText = "Puncte: " + userData.points;

      successes.innerText =
        "Total chestionare reușite: " + userData.quiz_successes;
      fails.innerHTML = "Total chestionare picate: " + userData.quiz_fails;
      let rankPending = {};
      let superiorRank = {};
      let pendingPoints = 0;
      if (userData.points >= ranks[ranks.length - 1].required) {
        rankPending = ranks[ranks.length - 1];
        punr.innerHTML = "Ai atins rank-ul maxim! Felicitări!";
      } else
        for (let i = 0; i < ranks.length; i++) {
          if (ranks[i].required > userData.points) {
            superiorRank = ranks[i];
            rankPending = ranks[i - 1];
            pendingPoints = ranks[i].required - userData.points;
            break;
          }
        }

      rank.innerText = rankPending.name;
      rank.style.color = rankPending.color;
      if (userData.points < ranks[ranks.length - 1].required) {
        punr.innerHTML =
          "Puncte rămase până la următorul rank: " +
          "<strong>" +
          pendingPoints +
          "</strong>";
      }
      for (let i = 0; i < allUsers.length; i++) {
        if (uid == allUsers[i].id) {
          place.innerText = "Poziția ta în clasament: #" + (i + 1);
          break;
        }
      }
    });
});
