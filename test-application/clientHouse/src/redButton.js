document.addEventListener("DOMContentLoaded", () => {
  let redBtn = document.querySelector("#red-btn");

  const changeMaisonColor = () => {
    const colorMurPremier = document.querySelectorAll(".maison-premier-mur");
    const colorToitPremier = document.querySelectorAll(".maison-premier-toit");
    // Je veux faire mais ca ne peut pas marché, index === 0 ? "blue" : "green"
    // Ici, je n'arrive pas à trouver un moyen pour que la maison redeviens bleu pour la maison bleu et verte pour la maison verte
    // Je suis obligé de demander à mon prof à domicile et m'as donnée une astuce en utilisant l'attribut dataset dans JS et data-color dans le php
    colorMurPremier.forEach((mur) => {
      colorChangedMaison(mur, "red", mur.dataset.color);
    });
    colorToitPremier.forEach((toit) => {
      colorChangedMaison(toit, "red", toit.dataset.color, "toit");
    });
  };

  redBtn.addEventListener("click", (event) => {
    event.preventDefault();
    changeMaisonColor();
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
    // const colorOriginal = elementMaison.dataset.color;
    if (elementMaison.style[propertyMaison] === colorOriginal) {
      elementMaison.style[propertyMaison] = colorChanged;
    } else {
      elementMaison.style[propertyMaison] = colorOriginal;
    }
  };
});
