<?php
/**
 * Problem: By listing the first six prime numbers: 2, 3, 5, 7, 11,
 * and 13, we can see that the 6th prime is 13.
 * What is the 10 001st prime number?
 *
 * Solution: Use a function to determine prime.
 * If prime, count it, either way, increment the test number
 */

include "helper.php";

function isPrime($x)
{
	for ($i=2; $i<$x; $i++) {
		if ($x%$i==0) {
#			echo "not prime\n";
			return false;
		}
	}
#	echo "prime\n";
	return true;
}

$count = 1;
$num = 3;

while ($count < 10001) {
	if (isPrime($num)) {
		$count++;
	}

	$num++;
}

result(104743, $num - 1);
