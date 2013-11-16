<?php
/**
 * Problem: The series, 1^1 + 2^2 + 3^3 + ... + 10^10 = 10405071317.
 *
 * Find the last ten digits of the series, 1^1 + 2^2 + 3^3 + ... + 1000^1000.
 *
 * Solution: Just add up each power.  Simple.
 */

include "helper.php";

$total  = 0;
$last = 1000;

for ($i=1; $i <= $last; $i++) { 
    $total = bcadd($total, bcpow($i, $i));
}

$total = substr($total, -10);

result(9110846700, $total);
