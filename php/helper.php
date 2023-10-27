<?php

function result($ANSWER, $attempt)
{
  if($ANSWER == $attempt)
  {
    echo "Success!\n";
    echo "Total time";
  }
  else
  {
    echo "Keep trying.\n";
    echo $attempt;
  }
}
