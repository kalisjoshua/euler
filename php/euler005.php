<?php

include "helper.php";

function hasRemainder($num) {
   $x = 20;
   while ($x > 0) {
      if ($num % $x != 0) return true;
      $x--;
   }
   return false;
}

$num = 20;
do {
   $num += 20;
} while (hasRemainder($num));

result(232792560, $num);
