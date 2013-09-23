<?php
/**
 * Problem: Let d(n) be defined as the sum of proper divisors of n (numbers less than n which divide evenly into n).
 * If d(a) = b and d(b) = a, where a ≠ b, then a and b are an amicable pair and each of a and b are called amicable
 * numbers.
 *
 * For example, the proper divisors of 220 are 1, 2, 4, 5, 10, 11, 20, 22, 44, 55 and 110; therefore d(220) = 284.
 * The proper divisors of 284 are 1, 2, 4, 71 and 142; so d(284) = 220.
 *
 * Evaluate the sum of all the amicable numbers under 10000.
 *
 * Solution: For each number 2 to 10000, check if it is amicable with the sum of its factors.  Too brute force.
 * Must refactor.
 */

include "helper.php";

function nameScore($name, $position)
{
    global $letters;

    $nameChars = str_split(strtolower($name));
    $nameScore = 0;

    foreach ($nameChars as $char) {
        $nameScore += $letters[$char];
    }

    return $nameScore * $position;
}

$letters = array('0' => 0,
    'a' => 1,
    'b' => 2,
    'c' => 3,
    'd' => 4,
    'e' => 5,
    'f' => 6,
    'g' => 7,
    'h' => 8,
    'i' => 9,
    'j' => 10,
    'k' => 11,
    'l' => 12,
    'm' => 13,
    'n' => 14,
    'o' => 15,
    'p' => 16,
    'q' => 17,
    'r' => 18,
    's' => 19,
    't' => 20,
    'u' => 21,
    'v' => 22,
    'w' => 23,
    'x' => 24,
    'y' => 25,
    'z' => 26);

$total = 0;
$x = 1;
$namesFile = fopen('./assets/022-names.txt', 'r');
$names = explode(",", fread($namesFile, 99000));
sort($names);
foreach ($names as $name) {
    $total += nameScore(str_replace('"', '', $name), $x);
    $x++;
}

result(871198282, $total);
