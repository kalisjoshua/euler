<?php

include "helper.php";

function hasRemainder($num) {
   $x = 20;
   while ($x > 10) {
      if ($num % $x != 0) return true;
      $x--;
   }
   return false;
}

$factor = $num = 20 * 19 * 18 * 17;
do {
   $num += $factor;
} while (hasRemainder($num));

result(232792560, $num);
