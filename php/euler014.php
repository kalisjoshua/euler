<?php
/**
 * Problem: The following iterative sequence is defined for the set of positive integers:
 * 
 * n → n/2 (n is even)
 * n → 3n + 1 (n is odd)
 * 
 * Using the rule above and starting with 13, we generate the following sequence:
 * 
 * 13 → 40 → 20 → 10 → 5 → 16 → 8 → 4 → 2 → 1
 * It can be seen that this sequence (starting at 13 and finishing at 1) contains
 * 10 terms. Although it has not been proved yet (Collatz Problem), it is thought
 * that all starting numbers finish at 1.
 * 
 * Which starting number, under one million, produces the longest chain?
 * 
 * Solution: Starting with 2 and working up towards 1,000,000, create each chain,
 * stopping where a previous chain has already been done.  So...  If we've already
 * created chains starting with 2 and 8, the array looks like (split links by "."):
 * 2 => ".1"
 * 8 => ".4.2.1"
 * Then, when we get to 10, we process the chain, checking for 5 to be already done and
 * it's not, so we move on and get to 16 which isn't done, so we move on and check for 8
 * and find a chain, at which point we stop processing and add 8's chain to the end.
 *
 * We don't stop until we try all 1,000,000 numbers.
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

function collatz($x)
{
	return ($x % 2 == 0) ? $x / 2 : $x * 3 + 1;
}

function genChain($num)
{
	global $chains, $longest, $length;

	$x = $num;
	$chains[$x] = $num;
	$num = collatz($num);
	while ($num != 1) {
		if (isset($chains[$num])) {
			$chains[$x] .= "." . $chains[$num];
			$num = 1;
		} else {
			$chains[$x] .= "." . $num;
			$num = collatz($num);
		}
	}
	$len = strlen($chains[$x]);
	if ($len > $length) {
		$length = $len;
		$longest = $x;
	}
}

$start = startTime();

$longest = 0;
$length = 0;
$chains = array(1 => "1");

for ($i=2; $i <= 1000000; $i++) { 
	genChain($i);
}
echo "The longest chain is " . $longest . " with " . (($length/2)+2) . " links.\n";

echo exTime($start) . " seconds to execute.\n";
