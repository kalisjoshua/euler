<?php

$start_time;

function mtime()
{
  $now = microtime();
  $now = explode(" ", $now);

  return $now[1] + $now[0];
}

function result($ANSWER, $attempt)
{
  global $start_time;

  $total_time = mtime() - $start_time;

  if($ANSWER == $attempt)
  {
    echo "Success!\n";
    echo "Total time, " . round($total_time, 4) . " seconds.\n";
  }
  else
  {
    echo "Keep trying.\n";
    echo $attempt;
  }
}

$start_time = mtime();
