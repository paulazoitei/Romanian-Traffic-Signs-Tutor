document.addEventListener("DOMContentLoaded", function () {
  fetch(
    "http://localhost/php/Romanian-Traffic-Signs-Tutor/Public/api/statistics",
    {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
      },
    }
  )
    .then((response) => response.json())
    .then((data) => {
      if (data.error) {
        alert(data.error);
      } else {
        // Actualizează elementele HTML cu datele reale
        document.getElementById("total-users").textContent = data.totalUsers;
        document.getElementById("total-admins").textContent = data.totalAdmins;
        document.getElementById("total-points").textContent = data.totalPoints;
        document.getElementById("quiz-success-rate").textContent =
          data.quizSuccessRate + "%";
        document.getElementById("number-of-questions").textContent =
          data.numberOfQuestions;
        document.getElementById("number-of-max-rank").textContent =
          data.numberMaxRank;
      }
    })
    .catch((error) => {
      console.error("Error:", error);
    });

  const ranks = [
    { name: "Începător", required: -1000000, color: "#62ff54" },
    { name: "Învățăcel", required: 20, color: "#a8fa34" },
    { name: "Intermediar", required: 70, color: "#34fabf" },
    { name: "Priceput", required: 150, color: "#fa9e34" },
    { name: "Avansat", required: 250, color: "#fa4534" },
    { name: "Extraordinar", required: 400, color: "#ff00a2" },
    { name: "Super talentat", required: 600, color: "#b300ff" },
    { name: "The Expert", required: 900, color: "#6c76d4" },
    { name: "Profesor de legislație", required: 1500, color: "#e8ca79" },
    { name: "Chestor principal", required: 3000, color: "#0400ff" },
  ];

  fetch("http://localhost/php/Romanian-Traffic-Signs-Tutor/Public/api/users")
    .then((response) => response.json())
    .then((data) => {
      const users = data;
      const rankCounts = ranks.map((rank) => ({ ...rank, count: 0 }));

      users.forEach((user) => {
        for (let i = ranks.length - 1; i >= 0; i--) {
          if (user.points >= ranks[i].required) {
            rankCounts[i].count++;
            break;
          }
        }
      });

      const labels = rankCounts.map((rank) => rank.name);
      const counts = rankCounts.map((rank) => rank.count);
      const colors = rankCounts.map((rank) => rank.color);

      fetch(
        "http://localhost/php/Romanian-Traffic-Signs-Tutor/Public/api/users"
      )
        .then((response) => response.json())
        .then((data) => {
          const users = data;
          const rankCounts = ranks.map((rank) => ({ ...rank, count: 0 }));

          users.forEach((user) => {
            for (let i = ranks.length - 1; i >= 0; i--) {
              if (user.points >= ranks[i].required) {
                rankCounts[i].count++;
                break;
              }
            }
          });

          const labels = rankCounts.map((rank) => rank.name);
          const counts = rankCounts.map((rank) => rank.count);
          const colors = rankCounts.map((rank) => rank.color);

          const ctx = document.getElementById("rankChart").getContext("2d");
          const rankChart = new Chart(ctx, {
            type: "pie",
            data: {
              labels: labels,
              datasets: [
                {
                  data: counts,
                  backgroundColor: colors,
                },
              ],
            },
            options: {
              responsive: true,
              plugins: {
                legend: {
                  position: "top",
                },
                tooltip: {
                  callbacks: {
                    label: function (tooltipItem) {
                      const total = counts.reduce(
                        (sum, count) => sum + count,
                        0
                      );
                      const currentValue = counts[tooltipItem.dataIndex];
                      const percentage = ((currentValue / total) * 100).toFixed(
                        2
                      );
                      return `${
                        labels[tooltipItem.dataIndex]
                      }: ${percentage}% (${currentValue} users)`;
                    },
                  },
                },
              },
            },
          });

          // Adaugă event listener pentru butonul de download după ce graficul este creat
          document
            .getElementById("downloadChart")
            .addEventListener("click", function () {
              const link = document.createElement("a");
              link.href = rankChart.toBase64Image();
              link.download = "rankChart.png";
              link.click();
            });
        })
        .catch((error) => {
          console.error("Error fetching data:", error);
        });
    });
});
