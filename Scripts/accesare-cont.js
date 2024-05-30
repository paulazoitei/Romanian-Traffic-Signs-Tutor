document.addEventListener("DOMContentLoaded", (e) => {
  let navButton = document.getElementById("profile-switcher");
  navButton.addEventListener("click", (e) => {
    if (localStorage.getItem("logged") === "true") {
      navButton.href = "profil";
    } else navButton.href = "auth";
  });
});
