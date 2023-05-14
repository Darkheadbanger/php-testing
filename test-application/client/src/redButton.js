const redBtn = document.querySelector("#red-btn");
const form = document.querySelector("#form");

const checkMaisonExist = () => {
  const colorMurPremier = document.querySelector(".maison-premier-mur");
  const colorToitPremier = document.querySelector(".maison-premier-toit");
  const colorMurDeuxieme = document.querySelector(".maison-second-mur");
  const colorToitDeuxieme = document.querySelector(".maison-second-toit");

  const maisonPremier = document.querySelector(".maison-premier");
  const maisonSecond = document.querySelector(".maison-second");

  const maisonPremiere =
    colorMurPremier &&
    colorToitPremier &&
    maisonPremier &&
    !maisonPremier.classList.contains("maison-premier--disabled");
  const maisonDeuxieme =
    colorMurDeuxieme &&
    colorToitDeuxieme &&
    maisonDeuxieme &&
    !maisonSecond.classList.contains("maison-second--disabled");
  const maisonExistes = maisonPremiere || maisonDeuxieme;
  if (maisonExistes) {
    redBtn.style.display = "none";
  } else {
    redBtn.style.display = "block";
    redBtn.addEventListener("click", (event) => {
      event.preventDefault();
      colorChangedMaison(colorMurPremier, "red", "pink");
      colorChangedMaison(colorMurDeuxieme, "red", "green");
      colorChangedMaison(colorToitPremier, "red", "pink", "toit");
      colorChangedMaison(colorToitDeuxieme, "red", "green", "toit");
    });
  }
};
checkMaisonExist();

form.addEventListener("submit", (event) => {
  event.preventDefault();
  // Soumettez le formulaire et générez les maisons avec votre code PHP ici
  // Après avoir generer la maison, vérifier si une maison entière existe ou non et montrer le bouton ou non
  checkMaisonExist();
});

const colorChangedMaison = (
  elementMaison,
  colorOriginal,
  colorChanged,
  type = "mur"
) => {
  if (!elementMaison) return;
  const propertyMaison =
    type !== "mur" ? "borderBottomColor" : "backgroundColor";
  if (elementMaison.style[propertyMaison] === colorOriginal) {
    elementMaison.style[propertyMaison] = colorChanged;
  } else {
    elementMaison.style[propertyMaison] = colorOriginal;
  }
};
