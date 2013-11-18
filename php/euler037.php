<?php
/**
 * Problem: The number 3797 has an interesting property. Being prime itself, it is possible to continuously
 * remove digits from left to right, and remain prime at each stage: 3797, 797, 97, and 7. Similarly we can
 * work from right to left: 3797, 379, 37, and 3.
 *
 * Find the sum of the only eleven primes that are both truncatable from left to right and right to left.
 *
 * NOTE: 2, 3, 5, and 7 are not considered to be truncatable primes.
 *
 * Solution: For this problem, the first and last digits of each of the 11 primes must be 2, 3, 5, or 7 in order
 * to meet the criteria.
 */

include "helper.php";

$primes = array(2, 3, 5, 7);

function isPrime($num) {
    if ($num == 1) {
        return false;
    }

    if ($num == 2) {
        return true;
    }

    if ($num % 2 == 0) {
        return false;
    }

    for ($i = 3; $i <= ceil(sqrt($num)); $i = $i + 2) {
        if($num % $i == 0)
            return false;
    }

    return true;
}

function getPrimes($howMany)
{
    global $primes;

    $x = 0;
    while ($x < $howMany) {
        $i = $primes[count($primes)-1];
        $isPrime = false;
        while (!$isPrime) {
            $i++;
            $isPrime = isPrime($i);
        }
        $primes[] = $i;
        $x++;
    }
}

function tPrime($n)
{
    $len = strlen($n);
    for ($i=2; $i <= $len; $i++) {
        if (isPrime(substr($n, 0, $i)) && isPrime(substr($n, strlen($n)-$i, $i))) {
        } else {
            return false;
        }
    }

    return true;
}

$n = 23;
$tPrimes = array();
getPrimes(50);

while (count($tPrimes) < 11) {
    if (tPrime($n)) {
        if (isPrime($n)) {
            $tPrimes[] = $n;
            echo ".";
        }
    }
    $n++;
    while (!in_array(substr($n, 0, 1), array(2,3,5,7)) || !in_array(substr($n, strlen($n)-1, 1), array(2,3,5,7))) {
        $n++;
    }
}
echo "\n";

$total = array_sum($tPrimes);

result(748317, $total);
