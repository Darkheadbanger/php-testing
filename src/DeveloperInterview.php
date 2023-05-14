<?php

declare(strict_types=1);

use PhpParser\Node\Stmt\Foreach_;
use PhpParser\Node\Stmt\While_;

// Pour les étapes de comment je trouve ou non la solution,
// je les ai écris sur le fichier Brouillons.txt
class DeveloperInterview
{
    /**
     * Write a short program that concats each number from 1 to 100.
     *
     * For each multiple of 3, concat "Fizz" instead of the number.
     *
     * For each multiple of 5, concat "Buzz" instead of the number.
     *
     * For numbers which are multiples of both 3 and 5, concat "FizzBuzz"
     * instead of the number.
     *
     * @return string
     */
    // Je dois mettre 100 dans le paramètre de test fizzbuzz
    public static function fizzBuzz(int $num): string
    {
        // Write your code!


        for ($i = 1; $i <= $num; $i++) {
            if ($i % 3 === 0 && $i % 5 === 0) $array[] = "FizzBuzz";
            elseif ($i % 3 === 0) $array[] = "Fizz";
            elseif ($i % 5 === 0) $array[] = "Buzz";
            else $array[] = $i;
        }
        $fizzBuzz = implode('', $array);

        return $fizzBuzz;
    }

    /**
     * For a given number, will return its value in Roman numerals.
     *
     * Roman Numerals Chart
     *
     * Roman Numeral | Number Value | Use As Inputs
     * --------------|--------------|---------------
     * I             | 1            | I
     * V             | 5            | V
     * X             | 10           | X
     * L             | 50           | L
     * C             | 100          | C
     * D             | 500          | D
     * M             | 1,000        | M
     *
     * @param int $value An integer between 0 and 3999
     *
     * @return string The roman number equivalent
     */

    //  Réussit jusqu'à que je dois éviter d'avoir 3 chiffres différents, je suis obliger de voir les docs et réflechir differement
    // 
    public static function parseToRoman(int $number): string
    {
        $result = '';

        // Write your code!
        // Tableaux des chiffres romains et décimaux, j'ai ajouté les chiffres qui ne repête pas 3 chiffres d'affilé comme le 4
        $romanNumeral = ['M', 'CM', 'D', 'CD', 'C', 'XC', 'L', 'XL', 'X', 'IX', 'V', 'IV', 'I'];
        $decimal = [1000, 900, 500, 400, 100, 90, 50, 40, 10, 9, 5, 4, 1];
        // Boucle pour parcourir les chiffres décimaux et les chiffres romains correspondants
        for ($i = 0; $i < count($decimal); $i++) {
            while ($number > $number % $decimal[$i]) {
                // On rajoute et concatène le reste de chiffre romain s'il faut
                $result .= $romanNumeral[$i];
                // On soustrait la valeur décimale en cours pour voir s'il reste de nombres inférieur que $number
                $number -= $decimal[$i];
            }
        }
        return $result;
    }

    /**
     * ROT-13 is the encrypting of a message by exchanging each of the
     * letters on the first half of the alphabet with the corresponding
     * letter in the second half of the alphabet (that is, swapping
     * positions by 13 characters). Thus, A becomes N, B becomes O,
     * and so forth, and conversely, N becomes A, O becomes B, and so
     * forth. Numbers, spaces and punctuation are not changed.
     *
     * Using the native `str_rot13` is forbiden, make your own implementation!
     *
     * @param string $value The string to decode
     *
     * @return string The decoded string
     */
    public static function toRot13(string $alphabet): string
    {
        $rot13_dict = [
            'a' => 'n', 'b' => 'o', 'c' => 'p', 'd' => 'q', 'e' => 'r',
            'f' => 's', 'g' => 't', 'h' => 'u', 'i' => 'v', 'j' => 'w', 'k' => 'x', 'l' => 'y', 'm' => 'z',
            'A' => 'N', 'B' => 'O', 'C' => 'P', 'D' => 'Q', 'E' => 'R',
            'F' => 'S', 'G' => 'T', 'H' => 'U', 'I' => 'V', 'J' => 'W', 'K' => 'X', 'L' => 'Y', 'M' => 'Z',
            'n' => 'a', 'o' => 'b', 'p' => 'c', 'q' => 'd', 'r' => 'e',
            's' => 'f', 't' => 'g', 'u' => 'h', 'v' => 'i', 'w' => 'j', 'x' => 'k', 'y' => 'l', 'z' => 'm',
            'N' => 'A', 'O' => 'B', 'P' => 'C', 'Q' => 'D', 'R' => 'E',
            'S' => 'F', 'T' => 'G', 'U' => 'H', 'V' => 'I', 'W' => 'J', 'X' => 'K', 'Y' => 'L', 'Z' => 'M',
            '0' => '0', '1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9',
            ' ' => ' ', '.' => '.', ',' => ',', ';' => ';', ':' => ':', '!' => '!', '?' => '?', '-' => '-', '_' => '_'
        ];

        $rot13 = "";
        // Write your code!
        $arrayAlphabet = str_split($alphabet);
        foreach ($arrayAlphabet as $keyAlphabet => $valueAlphabet) {
            foreach ($rot13_dict as $keyRot13 => $valueRot13) {
                if ($valueAlphabet === $keyRot13) {
                    $rot13 .= $valueRot13;
                }
            }
        }
        return $rot13;
    }

    /**
     * Write a regular expression that extracts the year from the $text
     * variable
     *
     * @return string the year
     */
    public static function extractYear(): string
    {
        $text = 'Rapport n°2187 (09/2019) - Achats';
        $year = '';

        // Write your code!
        $regex = "/(20)\d{2}/"; // Je prends les deux premiers digits donc 20, ici il n'y a qu'une seule possibilité d'un digit qui commence par 20 donc 2019
        if (preg_match($regex, $text, $matches)) // J'utilise preg match pour matcher le regex et le text et si match, je retourne match car le tableau de match est populé par "ceux qui est trouvé" donc dans ce cas 2019
        // Car c'est un tableau, il faut que je recupère le premier string donc le string année : 2019
        {
            $year = $matches[0];
        }

        return $year;
    }

    public function doSomething(): void
    {
    }

    /**
     * Ouch, this code is ugly. Can you improve it?
     *
     * @return boolean
     */
    public function simplifyMe($report, $rc): void
    {
        // Improved code
        if ($report !== '' || $rc !== 1) {
            $this->doSomething();
        }
    }

    /**
     * Get the factorial of a number
     *
     * @param int $number
     *
     * @return int
     */
    public static function factorial(int $number): int
    {
        $factorial = 0;

        // Write your code!

        if ($number === 1) {
            return 1;
        };
        $factorial = $number * self::factorial($number - 1);

        return $factorial;
    }

    /** I'm sorry, i'm blocked here and can't find the right solution
     * Get the angle formed by the hours and the minutes hands
     *
     * @param int $hours
     * @param int $minutes
     *
     * @return int
     */
    // public static function clockAngle(int $hours, int $minutes): int
    // {
    //     $angle = 0;
    //     // Pourquoi 30 partout, car dans une heure il y a  degrés et c'est pour ca je ne fais pas
    //     // 1=>30, 2=>60 etc
    //     $petiteAiguilleHeure = [
    //         1 => 30,
    //     ];
    //     $grandeAiguilleMinutes = [
    //         1 => 6,
    //     ];
    //     // Write your code!
    //     // Rendre 40 à 0.40. 40/100
    //     foreach ($petiteAiguilleHeure as $petiteAigKey => $petiteAigValue) {
    //         foreach ($grandeAiguilleMinutes as $grandeAigKey => $grandeAigValue) {
    //             $petiteHeure = $hours * $petiteAigValue;
    //             $grandeMinutes = $minutes * $grandeAigValue;
    //             // $grandeMinutes = $minutes * $grandeAigValue;
    //             $angle = $grandeMinutes - $petiteHeure;
    //         }
    //     };

    //     return $angle;
    // }
}
// Ici, pour tester directement depuis le navigateur c'est plus simple avant de tester avec PHPUnit
// print_r(DeveloperInterview::fizzBuzz(100));
