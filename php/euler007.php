<?php
/**
 * Problem: By listing the first six prime numbers: 2, 3, 5, 7, 11,
 * and 13, we can see that the 6th prime is 13.
 * What is the 10 001st prime number?
 *
 * Solution: Use a function to determine prime.
 * If prime, count it, either way, increment the test number
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
$start = startTime();
while ($count < 10001) {
	if (isPrime($num)) {
		$count++;
		echo $count . ": " . $num . " is prime. (" . exTime($start) . " seconds)\n";
		$start = startTime();
	}
	$num++;
}
