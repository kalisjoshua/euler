<?php
/**
 * Problem: The prime factors of 13195 are 5, 7, 13 and 29.
 * What is the largest prime factor of the number 600851475143 ?
 *
 * Solution: 1. Generate all the factors by lowest prime division
 *           2. Return the largest
 */

include "helper.php";

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

function sieve($num, $primes)
{
	$sieve = array_fill($primes[count($primes)-1]+1, $num, 0);

	foreach ($primes as $prime) {
		for ($i=$prime; $i < $num; $i+=$prime) {
			$sieve[$i] = 1;
		}
	}

	return $sieve;
}

function reducer($num, $sieve, $primes, $target)
{
	$negSieve = sieve($num, $primes);

	$new = $primes;
	foreach ($negSieve as $key => $value) {
		if ($value == 0 && isPrime($key)) {
			if (!in_array($key, $primes)) {
				$new[] = $key;
			}
		}
	}
// die();
	return $new;
}

function factorize(&$target, &$primes, &$factor)
{
    $multiplier =  2;
	$factored = true;
    $sieve = range($primes[count($primes)-1]+1, $factor);

    for ($i=0; $i < count($primes); $i++) {
        if ($target % $primes[$i] == 0) {
            $target = $target / $primes[$i];
            if (isPrime($target)) {
                result(6857, $target);
                die();
            }
        }
        if($i == count($primes) - 1) {
            $factored = false;
            $factor *= $multiplier;
            $primes = reducer($factor, $sieve, $primes, $target);
            factorize($target, $primes, $factor);
        }
    }
}

$primes = array(2, 3, 5, 7, 11, 13);
$factor = 2;
// $target = 13195;
$target = 600851475143;

factorize($target, $primes, $factor);

