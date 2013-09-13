<?php
/**
 * Problem: By listing the first six prime numbers: 2, 3, 5, 7, 11,
 * and 13, we can see that the 6th prime is 13.
 * What is the 10 001st prime number?
 *
 * Solution: 1. Build a solid sieve
 *           2. Run through a reducer to generate more primes
 *           3. Repeat 1 & 2 until the 10001st prime exists
 */

include "helper.php";

function isPrime($num, $primes)
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
		if ($value == 0  && isPrime($key, $primes)) {
			if (!in_array($key, $primes)) {
				$new[] = $key;
				if (count($new)-1 == $target) {
					result(104743, $new[$target-1]);
					die();
				}
			}
		}
	}

	return $new;
}


$primes = array(2, 3, 5, 7, 11, 13);
$target = 10001;
$sieve = range($primes[count($primes)-1]+1, 50);

$factor = $multiplier =  20;

while (count($primes) < $target) {
	echo "processing with a factor of ".$factor."\n";
	$primes = reducer($factor, $sieve, $primes, $target);
	$factor *= $multiplier;
}
