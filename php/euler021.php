<?php
/**
 * Problem: Let d(n) be defined as the sum of proper divisors of n (numbers less than n which divide evenly into n).
 * If d(a) = b and d(b) = a, where a ≠ b, then a and b are an amicable pair and each of a and b are called amicable
 * numbers.
 *
 * For example, the proper divisors of 220 are 1, 2, 4, 5, 10, 11, 20, 22, 44, 55 and 110; therefore d(220) = 284.
 * The proper divisors of 284 are 1, 2, 4, 71 and 142; so d(284) = 220.
 *
 * Evaluate the sum of all the amicable numbers under 10000.
 *
 * Solution: For each number 2 to 10000, check if it is amicable with the sum of its factors.  Too brute force.
 * Must refactor.
 */

include "helper.php";

function sumFactors($num)
{
    $factors = array(1);

    for ($i=$num-1; $i > 1; $i--) {
        if ($num % $i == 0) {
            $factors[] = $i;
        }
    }

    return array_sum($factors);
}

function isAmicable($a, $b)
{
    if (sumFactors($b) == $a && $a != $b) {
        return true;
    } else {
        return false;
    }
}

$amicable = array();

for ($a=1; $a <= 10000; $a++) {
    if (!in_array($a, $amicable)) {
        $b = sumFactors($a);
        if (isAmicable($a, $b)) {
            $amicable[] = $a;
            $amicable[] = $b;
        }
    }
}

$total = array_sum($amicable);

result(31626, $total);
