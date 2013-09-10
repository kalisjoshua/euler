<?php

include "helper.php";

function isPal($x) {
   $x = str_split($x);
   while (count($x) > 1) {
      if (array_pop($x) != array_shift($x)) {
         return false;
      }
   }

   return true;
}

$numa = 999;
$numb = 999;
$done = false;
while ($done === false) {
   $pal = (string) $numa*$numb;
   $done=isPal($pal);
   if ($numa==836) {
      $numa = $numb;
      $numb--;
   } else {
      $numa--;
   }
}

result(906609, $pal);
