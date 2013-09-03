<?php
/**
 * Problem: n! means n × (n − 1) × ... × 3 × 2 × 1
 *
 * For example, 10! = 10 × 9 × ... × 3 × 2 × 1 = 3628800,
 * and the sum of the digits in the number 10! is 3 + 6 + 2 + 8 + 8 + 0 + 0 = 27.
 *
 * Find the sum of the digits in the number 100!
 *
 * Solution: 
 */

function startTime()
{
	$mtime = microtime();
	$mtime = explode(" ",$mtime);
	$mtime = $mtime[1] + $mtime[0];
	$starttime = $mtime;

	return $starttime;
}

function exTime($starttime)
{
	$mtime = microtime();
	$mtime = explode(" ",$mtime);
	$mtime = $mtime[1] + $mtime[0];
	$endtime = $mtime;
	$totaltime = ($endtime - $starttime);

	return $totaltime;
}

$start = startTime();

function factorial($num)
{
	$tot = 1;
	for ($i=1; $i <= $num ; $i++) {
		$tot *= $i;
	}
	$tot = sprintf('%f', $tot); //Convert from Scientific notation
	$tot = substr($tot, 0, -7); //Remove the trailing decimal places
	return $tot;
}

$fact = factorial(100);
echo $fact . "\n";
$fact = str_split($fact);
$total = 0;
foreach ($fact as $digit) {
	$total += $digit;
}
echo "Total : " . $total . "\n";

echo exTime($start) . " seconds to execute.\n";
