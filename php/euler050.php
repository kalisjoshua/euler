<?php
/**
 * Problem: The prime 41, can be written as the sum of six consecutive primes:
 *
 * 41 = 2 + 3 + 5 + 7 + 11 + 13
 * This is the longest sum of consecutive primes that adds to a prime below one-hundred.
 * [nope... 53 is]
 *
 * The longest sum of consecutive primes below one-thousand that adds to a prime, contains 21 terms, and is
 * equal to 953.
 *
 * Which prime, below one-million, can be written as the sum of the most consecutive primes?
 *
 * Solution: 1. Build an array of primes
 *           2. Build an array of sums
 *           3. Build an array of cumulative sums with # of primes used
 *           4. Sort and sift until the larges under 1,000,000 pops out
 */

include "helper.php";

function isPrime($num)
{
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

$primes = array(2, 3, 5, 7, 11, 13);
$sums = array(2);
$primeSums = array(2 => 1);
$target = 4000;
$sieve = range($primes[count($primes)-1]+1, $target, 1);

foreach ($sieve as $num) {
    if (isPrime($num)) {
        $primes[] = $num;
    }
}

for ($i=1; $i < count($primes); $i++) {
    $sums[$i] = $sums[$i-1] + $primes[$i];
}

for ($i=1; $i < count($sums); $i++) {
    if (isPrime($sums[$i])) {
        $primeSums[$sums[$i]] = $i;
    }
    for ($j=1; $j < $i; $j++) {
        $thisSum = $sums[$i] - $sums[$j];
        if (isPrime($thisSum)) {
            $primeSums[$thisSum] = $i - $j;
        }
    }
}

function getLargest()
{
    global $primeSums;

    foreach ($primeSums as $key => $value) {
        if ($key <= 1000000) {
            return $key;
        }
    }
}

arsort($primeSums);
$largest = getLargest();

result(997651, $largest);
