document.addEventListener("DOMContentLoaded", function () {
  let dropdownList = document.getElementsByClassName("dropdown-container");
  let visible = true;
  let menu = document.getElementById("menu-button");
  let listItems = document.getElementsByClassName("toDisplay");
  menu.addEventListener("click", (event) => {
    event.preventDefault();
    if (visible) {
      for (let item of listItems) {
        item.style.display = "block";
        item.style.visibility = "initial";
        menu.style.opacity = "0.5";
      }
    } else {
      for (let item of listItems) {
        item.style.display = "none";
        item.style.visibility = "hidden";
        menu.style.opacity = "1";
      }
    }
    visible = !visible;
  });
  let handleWindowResize = function () {
    let windowWidth = window.innerWidth;
    if (windowWidth > 750) {
      for (let item of listItems) {
        item.style.visibility = "visible";
        item.style.display = "inline";
      }
    } else {
      for (let item of listItems) {
        item.style.visibility = "hidden";
        item.style.display = "none";
        menu.style.opacity = "1";
      }
    }
  };
  window.addEventListener("resize", handleWindowResize);
});
