<?php
/**
 * Problem: The sum of the primes below 10 is 2 + 3 + 5 + 7 = 17.
 * Find the sum of all the primes below two million.
 *
 * Solution: Use a Eratosthenes sieve to determine primes from
 * 2 to 2,000,000, adding as we go.  The first attempt without
 * a sieve took 900+ seconds to execute.  This one takes 1.3 seconds.
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

function eratosthenes_sieve(&$sieve, $n)
{
	$i = 2;
	$total = 0;

	while ($i <= $n) {
		if ($sieve[$i] == 0) {
			$total += $i;

			$j = $i;
			while ($j <= $n) {
				$sieve[$j] = 1;
				$j += $i;
			}
		}
		if ($i % floor($n / 100) == 0) {
			echo ".";
		}
		$i++;
	}

	echo "\n";

	return $total;
}

$start = startTime();
$n = 2000000;
$sieve = array_fill(0, $n, 0);
echo "[.......................25%......................50%......................75%....................100%]\n ";
echo "Sum is " . eratosthenes_sieve($sieve, $n) . "\n";
echo exTime($start) . " seconds to execute.\n";
