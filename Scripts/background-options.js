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
  let selectColor = "#42c9a8";
  let originalColor = "rgb(33, 177, 193)";

  variant1.addEventListener("click", (e) => {
    e.preventDefault();
    if (variant1.style.backgroundColor === originalColor) {
      v1Toggle = false;
    } else v1Toggle = true;
    if (v1Toggle === false) {
      variant1.style.backgroundColor = selectColor;
    } else {
      variant1.style.backgroundColor = originalColor;
    }
    v1Toggle = !v1Toggle;
    v1check.checked = v1Toggle;
  });

  variant2.addEventListener("click", (e) => {
    e.preventDefault();
    if (variant2.style.backgroundColor === originalColor) {
      v2Toggle = false;
    } else v2Toggle = true;
    console.log(v2Toggle);
    if (v2Toggle === false) {
      variant2.style.backgroundColor = selectColor;
    } else {
      variant2.style.backgroundColor = originalColor;
    }
    v2Toggle = !v2Toggle;
    v2check.checked = v2Toggle;
  });

  variant3.addEventListener("click", (e) => {
    e.preventDefault();
    if (variant3.style.backgroundColor === originalColor) {
      v3Toggle = false;
    } else v3Toggle = true;
    if (v3Toggle === false) {
      variant3.style.backgroundColor = selectColor;
    } else {
      variant3.style.backgroundColor = originalColor;
    }
    v3Toggle = !v3Toggle;
    v3check.checked = v3Toggle;
  });
});
