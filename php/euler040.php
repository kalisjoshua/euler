<?php
/**
 * Problem: An irrational decimal fraction is created by concatenating the positive integers:
 * 
 * 0.123456789101112131415161718192021...
 * 
 * It can be seen that the 12th digit of the fractional part is 1.
 * 
 * If dn represents the nth digit of the fractional part, find the value of the following expression.
 * 
 * d1 × d10 × d100 × d1000 × d10000 × d100000 × d1000000
 *
 * Solution: 
 */

include "helper.php";

$num = ".";
$int = 1;

while (strlen($num) <= 1000000) {
    $num .= $int;
    $int++;
}


$total = substr($num, 1, 1);

for ($i=10; $i <= 1000000 ; $i*=10) { 
    $digit = substr($num, $i, 1);
    $total *= $digit;
}

result(210, $total);
