document.addEventListener("DOMContentLoaded", function () {
  const submitLogin = document.getElementById("submit-login");

  submitLogin.addEventListener("click", (e) => {
    localStorage.setItem("logged", "true");
    this.location.reload(true);
  });
});
