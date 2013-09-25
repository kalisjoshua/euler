<?php
/**
 * Problem: Starting with the number 1 and moving to the right in a clockwise direction a 5 by 5 spiral is formed as follows:
 *
 * 21 22 23 24 25
 * 20  7  8  9 10
 * 19  6  1  2 11
 * 18  5  4  3 12
 * 17 16 15 14 13
 *
 * It can be verified that the sum of the numbers on the diagonals is 101.
 *
 * What is the sum of the numbers on the diagonals in a 1001 by 1001 spiral formed in the same way?
 *
 * Solution: It's best to think of the grid in terms of how we will process it rather than worry about how it
 * is displayed.  We will be adding the first number and then for each of 4 steps, adding the number that is two
 * positions past the current number.  Then for four more steps, adding the number that is FOUR positions past, then
 * SIX positions, etc.  For grid size, we can assume that we process until our factor (2,4,6,8) + 1 is equal to our
 * intended grid size.
 *
 * When we think about it this way, it's a simple loop.
 */

include "helper.php";

$total  = 1; // Always start with 1 (the "center")
$factor = 2;
$size   = 1001;
$x      = 1;
while ($factor + 1 <= $size) {
    for ($i=0; $i < 4; $i++) {
        $x = $x + $factor;
        $total += $x;
    }

    $factor += 2;
}

result(669171001, $total);
