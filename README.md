# Test développeur en PHP

2 parties :

- [Test algorithmique](#test-algorithmique)
- [Test applicatif](#test-applicatif)

Test algorithmique
--

### Pré-requis

- PHP >=8.2
- Composer (https://getcomposer.org/)

### Installation

```sh
composer install --dev
```

Si vous n'avez pas de token Github pour composer (actif par défaut), vous pouvez désactiver son usage avec la commande suivante (puis relancer le `composer install --dev`)


```sh
composer config --global --unset github-oauth.github.com
```

Écrivez vos fonctions dans `src/DeveloperInterview.php`, puis lancez les tests:

```sh
./vendor/bin/phpunit --testdox --bootstrap vendor/autoload.php tests
```

### Exercices

#### FizzBuzz

- Rédigez un programme court qui concatène chaque numéro de 1 à 100 à la suite.
- Pour chaque multiple de 3, concatènez "Fizz" au lieu du numéro.
- Pour chaque multiple de 5, concatènez "Buzz" au lieu du numéro.
- Pour les nombres qui sont des multiples de 3 et de 5, concatènez "FizzBuzz" au lieu du nombre.

#### Transformation d'un nombre décimal en nombre romain

Rédigez une fonction appelé `parseToRoman` qui, pour un nombre donné, va retourner sa valeur en chiffres romains (<3999).

```php
parseToRoman(1234); // === 'MCCXXXIV'
```

#### Algorithme de (dé)chiffrement ROT13

Rédigez une fonction ROT13 (ou Rotate By 13 Places). L’idée est de décaler chacune des lettres de l’alphabet de 13 places. Autrement dit, le H devient le U, le E devient le R, etc. Interdit d'utiliser la fonction native `str_rot13` ;)

```php
toRot13('URYYB JBEYQ'); // HELLO WORLD
```

#### Expression régulière

Rédigez une fonction qui utilse une expression régulière et qui extrait l'année dans le texte suivant :

> Rapport n°2187 (09/2019) - Achats

```php
extractYear(); // 2019
```

#### Optimisation

Analysez la fonction `simplifyMe` et modifiez là pour l'améliorer (indice : chercher à inverser la condition booléene)

#### Fonction Factorielle

Écrire une fonction qui retourne la factorielle d'un nombre (indice : la méthode récursive est à priviligier)

```php
factorial(5); // 120
```

#### Fonction de calcul de l'angle d'une pendule

Écrire une fonction qui retourne l'angle formé par les aiguilles d'une pendule (entre la petite et la grande aiguille).

Le premier argument est le chiffre des heures (petite aiguille), le second le chiffre des minutes (grande aiguille)

```php
clockAngle(3, 30); // 75
```

Test applicatif
---

L'objectif est de créer une page web avec un formulaire qui demandera combien de maisons vertes et combien de maisons bleues l'utilisateur veut dessiner.  Une fois le formulaire soumis, la page générera X numéros de maisons vertes et Y numéros de maisons bleues sous le formulaire. Les différents choix pour ce test sont entièrement libres, libre à vous d'utiliser un framework ou de tout faire à la main.

### PHP

- Créer un fichier `index.php` qui sera accessible via un domaine local.
- Créer une classe `MyHouse` qui a 2 propriétés (`color`, `size`) et une méthode `generate` qui générera le code html pour dessiner les deux types de maisons et prendra en compte les propriétés de taille et de couleur.
- Créez deux classes (`MyHouse1`, `MyHouse2`), qui hériteront de toutes les propriétés de `MyHouse` et surchargeront les propriétés de couleur et de taille avec leurs propres paramètres.

### Formulaire // fait

- Créez un formulaire (méthode POST) qui acceptera le nombre de MyHouse1 à créer comme première entrée, et le nombre de MyHouse2 comme deuxième entrée.
- Les champs de saisie doivent afficher les valeurs de la demande précédente, si elles existent.
- Créez le bouton de soumission.

### CSS // Fait

- Joignez un fichier css qui vous aidera à styliser les maisons (de simples maisons carrées suffisent, vous pouvez peut-être faire mieux), le formulaire et les boutons.
- Au hover, rendez les maisons transparentes.

### Javascript // Fait

- Créer un bouton sur la page qui coloriera toutes les maisons en rouge avec du javascript si elles existent

### Bonus :

SQL - Connectez-vous à toutes les requêtes dans une base de données sql qui enregistre le nombre de maisons demandées pour chaque type.
