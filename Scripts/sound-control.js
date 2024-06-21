document.addEventListener("DOMContentLoaded", () => {
  const soundIcon = document.getElementById("sound-icon");
  const audio = document.getElementById("audio");

  let isMuted = false;

  function toggleSound() {
    isMuted = !isMuted;

    if (isMuted) {
      soundIcon.src = "../Assets/Images/sound-off.png";
      audio.muted = true;
    } else {
      soundIcon.src = "../Assets/Images/sound-on.png";
      audio.muted = false;
    }
  }

  soundIcon.addEventListener("click", toggleSound);
});
