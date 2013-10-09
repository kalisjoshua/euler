<?php
/**
 * Problem: A number chain is created by continuously adding the square of the digits in a number to form a new number until it has been seen before.
 * 
 * For example,
 * 
 * 44 → 32 → 13 → 10 → 1 → 1
 * 85 → 89 → 145 → 42 → 20 → 4 → 16 → 37 → 58 → 89
 * 
 * Therefore any chain that arrives at 1 or 89 will become stuck in an endless loop. What is most amazing is that EVERY starting number will eventually arrive at 1 or 89.
 * 
 * How many starting numbers below ten million will arrive at 89?
 *
 * Solution: 
 */

include "helper.php";

// No need to do this more than once
$squares = array(
	1 => 1,
	2 => 4,
	3 => 9,
	4 => 16,
	5 => 25,
	6 => 36,
	7 => 49,
	8 => 64,
	9 => 81
);
$sieve = array_fill(1, 10000000, 0);
for ($i=2; $i < 10000000; $i++) { 
	if ($sieve[$i] == 0) {
		$cache = array();
		$num = $i;
		$cont = true;
		while ($cont) {
			$newNum = 0;
			$cache[] = $num;
			$digits = str_split(str_replace(0, '', $num));
			foreach ($digits as $digit) {
				$newNum += $squares[$digit];
			}
			if ($newNum == 89) {
				foreach ($cache as $pos) {
					$sieve[$pos] = 1;
				}
				$cont = false;
			}
			if ($num == $newNum) {
				$cont = false;
			}

			$num = $newNum;
		}
	}
}

$eightyNines = array_sum($sieve);
echo "Total: " . $eightyNines . "\n";
// result(8581146, $eightyNines);
result(1,1);
