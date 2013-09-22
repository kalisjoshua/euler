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

function c($a, $b)
{
	return sqrt(pow($a, 2) + pow($b, 2));
}

$a = 3;
$b = 4;
$c = 1000;

while ($a + $b + c($a, $b) != $c) {
	$b++;
	if ($b > 1000) {
		$a++;
		$b = $a + 1;
	}
}

$found = $a * $b * c($a, $b);

result(31875000, $found);
