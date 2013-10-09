<?php
/**
 * Problem: What is the first term in the Fibonacci sequence to contain 1000 digits?
 *
 * Solution: Brute force ftw.
 */

include "helper.php";

function fib($x, $y, $term)
{
	$fib = bcadd($x, $y);
	$term += 1;
	if (strlen($fib) >= 1000) {
		echo "Term is " . $term . "\n";
		result('4782', $term);
	} else {
		fib($y, $fib, $term);
	}
}

fib(2, 3, 4);
