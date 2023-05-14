document.addEventListener("DOMContentLoaded", () => {
  const updateVisibilite = () => {
    let maisonPremier = document.querySelector(".maison-premier");
    let redBtn = document.querySelector("#red-btn");

    const maisonExiste = maisonPremier;
    if (maisonExiste === null) {
      redBtn.style.display = "none";
    } else {
      redBtn.style.display = "block";
    }
  };
  updateVisibilite();
});
