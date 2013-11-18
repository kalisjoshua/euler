<?php
/**
 * Problem: The decimal number, 585 = 10010010012 (binary), is palindromic in both bases.
 *
 * Find the sum of all numbers, less than one million, which are palindromic in base 10 and base 2.
 *
 * (Please note that the palindromic number, in either base, may not include leading zeros.)
 *
 * Solution: 
 */

include "helper.php";

function isPalindromic($num)
{
    $digits = str_split($num);
    $len = count($digits);

    for ($i=0; $i < floor($len/2); $i++) {
        if ($digits[$i] != $digits[$len - $i - 1]) {
            return false;
        }
    }

    return true;
}

$total = 0;

for ($i=1; $i < 1000000; $i++) { 
    if (isPalindromic($i)) {
        if (isPalindromic(decbin($i))) {
            $total += $i;
        }
    }
}

result(872187, $total);
