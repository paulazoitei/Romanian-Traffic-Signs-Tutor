document.addEventListener("DOMContentLoaded", function () {
  let variant1 = document.getElementById("v1cont");
  let variant2 = document.getElementById("v2cont");
  let variant3 = document.getElementById("v3cont");

  let v1check = document.getElementById("variant1");
  let v2check = document.getElementById("variant2");
  let v3check = document.getElementById("variant3");
  let v1Toggle = false;
  let v2Toggle = false;
  let v3Toggle = false;
  let selectColor = "#8c6464";
  variant1.addEventListener("click", (e) => {
    e.preventDefault();
    if (v1Toggle === false) {
      variant1.style.backgroundColor = selectColor;
    } else {
      variant1.style.backgroundColor = "rgb(137, 67, 67)";
    }
    v1Toggle = !v1Toggle;
    v1check.checked = v1Toggle;
  });

  variant2.addEventListener("click", (e) => {
    e.preventDefault();
    if (v2Toggle === false) {
      variant2.style.backgroundColor = selectColor;
    } else {
      variant2.style.backgroundColor = "rgb(137, 67, 67)";
    }
    v2Toggle = !v2Toggle;
    v2check.checked = v2Toggle;
  });

  variant3.addEventListener("click", (e) => {
    e.preventDefault();
    if (v3Toggle === false) {
      variant3.style.backgroundColor = selectColor;
    } else {
      variant3.style.backgroundColor = "rgb(137, 67, 67)";
    }
    v3Toggle = !v3Toggle;
    v3check.checked = v3Toggle;
  });
});
