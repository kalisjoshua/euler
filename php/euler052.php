<?php
/**
 * Problem: It can be seen that the number, 125874, and its double, 251748, contain exactly the same digits, but in a different order.
 *
 * Find the smallest positive integer, x, such that 2x, 3x, 4x, 5x, and 6x, contain the same digits.
 *
 * Solution:
 */

include "helper.php";

$found = false;
$i = 1;

while (!$found) {
    $i++;

    $digits2 = str_split($i * 2);
    sort($digits2);

    $digits3 = str_split($i * 3);
    sort($digits3);

    $digits4 = str_split($i * 4);
    sort($digits4);

    $digits5 = str_split($i * 5);
    sort($digits5);

    $digits6 = str_split($i * 6);
    sort($digits6);

    if (($digits2 == $digits3)
         && ($digits3 == $digits4)
         && ($digits4 == $digits5)
         && ($digits5 == $digits6)
        ) {
        $found = true;
        $total = $i;
    }
}

result(142857, $total);
