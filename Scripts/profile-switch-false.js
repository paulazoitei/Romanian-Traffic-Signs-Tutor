document.addEventListener("DOMContentLoaded", (e) => {
  const signOut = document.getElementById("sign-out");
  signOut.addEventListener("click", (e) => {
    localStorage.setItem("logged", "false");
    this.location.reload(true);
  });
});
