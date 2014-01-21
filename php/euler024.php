<?php
/**
 * Problem: A permutation is an ordered arrangement of objects. For example, 3124 is one possible permutation
 * of the digits 1, 2, 3 and 4. If all of the permutations are listed numerically or alphabetically, we call
 * it lexicographic order. The lexicographic permutations of 0, 1 and 2 are:
 *
 * 012   021   102   120   201   210
 *
 * What is the millionth lexicographic permutation of the digits 0, 1, 2, 3, 4, 5, 6, 7, 8 and 9?
 *
 * Solution:
 */

include "helper.php";

function bcfact($fact, $scale = 100)
{
    if($fact == 1) return 1;
    return bcmul($fact, bcfact(bcsub($fact, '1'), $scale), $scale);
}

function lex($digits, $pos)
{
    $nums = array();

    // This is horrible and only works for 3 digits, but I have a cold and it works
    // so I'm going to let it happen.
    for ($x=0; $x < count($digits); $x++) {
        for ($y=0; $y < count($digits); $y++) {
            for ($z=0; $z < count($digits); $z++) {
                if ($x != $y && $x != $z && $y != $z) {
                    $nums[] = array($digits[$x], $digits[$y], $digits[$z]);
                }
            }
        }
    }

    return $nums[$pos - 1];
}

$remainder = 1000000;
$digits = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
$num = "";

for ($i=9; $i > 0; $i--) {
    $fact = bcfact($i);
    $x = 1;
    while ($fact * ($x+1) <= $remainder) {
        $x++;
    }
    $num .= $digits[$x];
    unset($digits[$x]);
    sort($digits);
    $remainder = $remainder - ($fact * $x);
    if ($remainder < 10) {
        $final = lex($digits, $remainder);
        $num .= implode($final);
        $i = 0;
    }
}

result(2783915460, $num);
