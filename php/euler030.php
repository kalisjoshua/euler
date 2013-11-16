<?php
/**
 * Problem: Surprisingly there are only three numbers that can be written as the sum of fourth powers of their digits:
 *
 * 1634 = 1^4 + 6^4 + 3^4 + 4^4
 * 8208 = 8^4 + 2^4 + 0^4 + 8^4
 * 9474 = 9^4 + 4^4 + 7^4 + 4^4
 * As 1 = 1^4 is not a sum it is not included.
 *
 * The sum of these numbers is 1634 + 8208 + 9474 = 19316.
 *
 * Find the sum of all the numbers that can be written as the sum of fifth powers of their digits.
 *
 * Solution: I messed with the maximum number to check until 6 x 9^5 seemed to feel right.
 * Then I set up an array of digits each to the power of 5 so I only do each once.
 * Finally, loop through every number 2 through the max, checking.  There is probably a faster
 * way, but this works in under a second.
 */

include "helper.php";

$power = 5;
$pows = array(
    0,
    1,
    pow(2, $power),
    pow(3, $power),
    pow(4, $power),
    pow(5, $power),
    pow(6, $power),
    pow(7, $power),
    pow(8, $power),
    pow(9, $power)
    );

$total = 0;

$start = 2;
for ($i=$start; $i <= 354294 ; $i++) {
    $digits = str_split($i);
    $sum = 0;
    $str = "";

    foreach ($digits as $digit) {
        $sum += $pows[$digit];
        $str .= " " . $pows[$digit];
    }

    if ($i == $sum) {
        $total += $sum;
    }
}
// echo "Total : $total\n";

result(443839, $total);
