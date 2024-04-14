document.addEventListener("DOMContentLoaded", (e) => {
  let navButton = document.getElementById("profile-switcher");
  navButton.addEventListener("click", (e) => {
    if (localStorage.getItem("logged") === "true") {
      navButton.href = "../Html_Components/profil.html";
    } else navButton.href = "../Html_Components/auth.html";
  });
});
