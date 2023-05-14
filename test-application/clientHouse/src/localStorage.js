document.addEventListener("DOMContentLoaded", () => {
  // Sélectionner les éléments input et le formulaire
  const inputMaisonBleu = document.querySelector("#maisonBleu");
  const inputMaisonVerte = document.querySelector("#maisonVerte");
  let form = document.querySelector("#form");

  let getLocalStorage = () => {
    // Récupérer les données enregistrées dans le localStorage pour le nombre des maisons bleues et vertes, sinon utiliser une chaîne vide
    let dataInputMaisonBleu = localStorage.getItem("dataInputMaisonBleu") || "";
    let dataInputMaisonVerte =
      localStorage.getItem("dataInputMaisonVerte") || "";

    // Mettre à jour les valeurs des champs de saisie avec les données récupérées du localStorage
    [inputMaisonBleu.value, inputMaisonBleu.dataset.value] = [
      dataInputMaisonBleu,
    ];
    [inputMaisonVerte.value, inputMaisonVerte.dataset.value] = [
      dataInputMaisonVerte,
    ];

    // Afficher les données récupérées dans la console pour vérifier leur contenu
    // console.log("data", inputMaisonVerte.dataset.value, inputMaisonBleu.dataset.value);
  };

  let setLocalStorage = () => {
    localStorage.setItem("dataInputMaisonBleu", inputMaisonBleu.value);
    localStorage.setItem("dataInputMaisonVerte", inputMaisonVerte.value);
  };

  // Charger les données du localStorage au chargement de la page
  getLocalStorage();

  form.addEventListener("submit", (event) => {
    // Je soumet manuellement en utilisant la méthode submit() et en utilisant preventDefault(). Cela permet de garantir
    // que les données sont stockées dans le localstorage en premier pour ensuite l'envoyer au serveur
    event.preventDefault();
    setLocalStorage();
    form.submit();
  });
});
