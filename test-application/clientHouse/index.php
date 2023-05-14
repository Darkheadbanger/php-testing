<?php

declare(strict_types=1);
$maisonBleu = $_POST['maisonBleu'] ?? '';
$maisonVerte = $_POST['maisonVerte'] ?? '';

class MyHouse
{
  private string $color;
  private int $size;
  // Constructeur pour initialiser les valeurs de couleur et de taille de la maison
  public function __construct(string $color, int $size)
  {
    $this->color = $color;
    $this->size = $size;
  }
  // Méthode getter pour récupérer les valeurs de couleur et taille sans les modifier (donc pas de setter)
  public function getColorAndSize()
  {
    return [$this->color, $this->size];
  }
  // Méthode generate pour générer le HTML de la maison en utilisant les valeurs de couleur et taille
  public function generate(): string | int
  {
    [$colorMaison, $sizeMaison] = $this->getColorAndSize();
    $maisonColor = 'background-color: ' . $colorMaison . ';';
    // Peronnelement pour le toit, je ne sais si je dois le garder dans mon scss (_mixins.scss ligne 43) ou ici
    $maisonToitColor = 'border-bottom: ' . '100px solid ' . $colorMaison . ';';
    // pour $maisonSizeWidth et Height, j'ai mis !important car ces codes commencent à partir de breakpoints 768px
    // car avant le breakpoints (@mixins mobile-small jusqu'à tablet-small-mur qui est 768px) est géré differements, avec le sass (regardez mixins.scss ligne 76 et maison-generer.scss ligne 38)
    $maisonSizeWidth = 'width: ' . $sizeMaison . 'px !important;';
    $maisonSizeHeight = 'height: ' . $sizeMaison . 'px !important;';
    return '<div class="maison-premier maison-premier--disabled">
    <div class="maison-premier-toit" data-color="' . $colorMaison . '" style="' . $maisonToitColor . '" class="maison-premier-toit--red-enabled maison-premier-toit--red-disabled"></div>
    <div class="maison-premier__fenetre maison-premier__fenetre--red-enabled maison-premier__fenetre--red-disabled"></div>
    <div class="maison-premier-mur" data-color="' . $colorMaison . '" style="' . $maisonColor . $maisonSizeWidth . $maisonSizeHeight . '" class="maison-premier-mur--color-enabled maison-premier-mur--color-disabled"></div>
    <div class="maison-premier__porte"></div>
    </div>';
  }
}

class MyHouse1 extends MyHouse
{
  public function __construct()
  {
    parent::__construct("blue", 115); //115px
  }
}
class MyHouse2 extends MyHouse
{
  public function __construct()
  {
    parent::__construct("green", 115);
  }
}
// Je vérifier si on utilise la méthode POST pour envoie de données ET je vérifie pour $etre sur que maisonBleu et maisonVerte
// sont correctement définie dans une variable et non null
if ($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['maisonBleu']) || isset($_POST['maisonVerte']))) {
  $data = [
    'maisonBleu' => intval($maisonBleu),
    'maisonVerte' => intval($maisonVerte),
  ];
  file_put_contents('data.json', json_encode($data));
}

// Lisez les données de data.json
$data = json_decode(file_get_contents('data.json'), true);
$maisonBleu = $data['maisonBleu'] ?? '';
$maisonVerte = $data['maisonVerte'] ?? '';

$myHouse1 = new MyHouse1();
$myHouse2 = new MyHouse2();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Test applicatif : Maisons</title>
  <link rel="stylesheet" href="./public/css/prefixed/main.css" />
</head>

<body>
  <div class="form-container">
    <form class="form-maison" id="form" method="post" action="index.php">
      <label class="form-maison__label" for="maisonBleu">Maison bleu:</label>
      <input class="form-maison__input" value="<?php echo $maisonBleu ?>" data-value="<?php echo $maisonBleu ?>" type="number" id="maisonBleu" name="maisonBleu" placeholder="Entrez le nombre de la maison bleu" min="0" required />
      <label class="form-maison__label" for="maisonVerte">Maison verte:</label>
      <input class="form-maison__input" value="<?php echo $maisonVerte ?>" data-value="<?php echo $maisonVerte ?>" type="number" id="maisonVerte" name="maisonVerte" placeholder="Entrez le nombre de la maison verte" min="0" required />
      <div class="bouton-generated-maison">
        <button class="bouton-generated-maison__btn" id="submitBtn" type="submit">
          Soumettre la maison
        </button>
      </div>
    </form>
    <div class="maison-container">
      <?php
      for ($i = 0; $i < $maisonBleu; $i++) {
        echo $myHouse1->generate();
      };
      for ($i = 0; $i < $maisonVerte; $i++) {
        echo $myHouse2->generate();
      };
      ?>
    </div>
    <div class="button-maison-couleur">
      <button id="red-btn" class="button-maison-couleur__btn">
        Rendre la maison rouge
      </button>
    </div>
  </div>
  <script defer src="./src/localStorage.js"></script>
  <script defer src="./src/redButton.js"></script>
  <script defer src="./src/btnVisibilite.js"></script>
</body>

</html>