<?php
/**
 * Problem: The number, 197, is called a circular prime because all rotations of the digits:
 * 197, 971, and 719, are themselves prime.
 *
 * There are thirteen such primes below 100: 2, 3, 5, 7, 11, 13, 17, 31, 37, 71, 73, 79, and 97.
 *
 * How many circular primes are there below one million?
 *
 * Solution: Loop through numbers up to 1,000,000.  Discard non-primes.  For primes, discard any that contain
 * a 0, 2, 4, 5, 6, 8 as these will all have at least one rotated number that is non-prime.  Anything past this
 * point gets digits rotated and checked for prime.
 */

include "helper.php";

function isPrime($num)
{
    // Simplified prime checker for this particular case.
    if ($num % 2 == 0) {
        return false;
    }

    $sq = ceil(sqrt($num));

    for ($i = 3; $i <= $sq; $i = $i + 2) {
        if($num % $i == 0)
            return false;
    }

    return true;
}

function rotateLeft($num)
{
    $string = $num;

    return substr($string, 1, strlen($string) - 1) . $string[0];
}

function isCircular($num)
{
    if (!isPrime($num)) {
        return false;
    }


    if ($num > 10) {
        $numstr = (string) $num;
        if (strstr($numstr, "0") || strstr($numstr, "5") || strstr($numstr, "2") || strstr($numstr, "4") || strstr($numstr, "6") || strstr($numstr, "8")) {
            return false;
        }
        $len = strlen($numstr);
        for ($i=0; $i < $len - 1; $i++) {
            $numstr = (string) $num;
            $num = rotateLeft($numstr);

            if (!isPrime((int) $num)) {
                return false;
            }
        }
    }

    return true;
}

$target = 1000000;
$circular = 1; // starting with a known prime 2

for ($i=3; $i < $target; $i++) {
    if (isCircular($i)) {
        $circular++;
    }
}

result(55, $circular);
