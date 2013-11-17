<?php
/**
 * Problem: 145 is a curious number, as 1! + 4! + 5! = 1 + 24 + 120 = 145.
 *
 * Find the sum of all numbers which are equal to the sum of the factorial of their digits.
 *
 * Note: as 1! = 1 and 2! = 2 are not sums they are not included.
 *
 * Solution: 
 */

include "helper.php";

function factDigits($n)
{
    $digits = str_split($n);
    $total = 0;

    foreach ($digits as $digit) {
        $total += factorial($digit);
    }

    return $total;
}

function factorial ($n)
{
    if ($n <= 1) {
        return 1;
    } else {
        return $n * factorial($n - 1);
    }
}

$total  = 0;
$top    = 50000;

for ($i=3; $i <= $top; $i++) { 
    if (factDigits($i) == $i) {
        $total += $i;
    }
}

result(40730, $total);
