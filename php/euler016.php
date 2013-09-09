<?php
/**
 * Problem: 2^15 = 32768 and the sum of its digits is 3 + 2 + 7 + 6 + 8 = 26.
 * 
 * What is the sum of the digits of the number 2^1000?
 * 
 * Solution: The trick is the scientific notation.  First, we generate the 2^1000
 * number.  Then I'll strip all the trailing zero digits since we don't need them.
 * Finally, sum the rest of the numbers.
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

$num = sprintf('%f', pow(2, 1000));
$num = str_split(substr($num, 0, -7));
$tot = array_sum($num);
echo "Sum: " . $tot . "\n";
echo "\n";
echo exTime($start) . " seconds to execute.\n";
