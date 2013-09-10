<?php
/**
 * Problem: Find the sum all all numbers that are multiples of 3
 * or 5 from 1 to 999
 *
 * Solution: Sum all the multiples of 3, sum all the multiples
 * of 5, add them together, sum all the multiples of 15, and
 * subtract.
 */

include "helper.php";

function sumMultiplesOf($x)
{
   $sum = $num = 0;
   while ($num <= 999) {
      if ($num % $x == 0) {
         $sum += $num;
      }
      $num++;
   }

   return $sum;
}

$result = sumMultiplesOf(3) + sumMultiplesOf(5) - sumMultiplesOf(15);

result(233168, $result);
