<?php
/**
 * Problem: A Pythagorean triplet is a set of three natural numbers, a < b < c, for which,
 * a2 + b2 = c2
 * For example, 3^2 + 4^2 = 9 + 16 = 25 = 5^2. (3^2 + 4^2 = 5^2)
 * There exists exactly one Pythagorean triplet for which a + b + c = 1000.
 * Find the product abc.
 *
 * Solution: Increment numbers as needed while checking each set to see if
 * it's a pythagorean triple.  If so, check if sum is 1,000.  When sum of
 * 1,000 is found, multiply for the product.
 */

include "helper.php";

function isPyTrip($a, $b, $c)
{
	if (($a*$a)+($b*$b)==($c*$c)) {
		return true;
	} else {
		return false;
	}
}

$f1 = 1; // starting factor a
$f2 = 2; // starting factor b
$p  = 3; // starting product
$found = false;

while ($found === false) {
	if (isPyTrip($f1, $f2, $p)) {
		if ($f1 + $f2 + $p == 1000) {
			$found = $f1*$f2*$p;
		}
	}

	// Increment the factors and product appropriately
	$p++;
	if ($p > 998) {
		$f2++;
		$p = $f2 + 1;
	}
	if ($f2 > 997) {
		$f1++;
		$f2 = $f1 + 1;
		$p = $f2 + 1;
	}
}

result(31875000, $found);
