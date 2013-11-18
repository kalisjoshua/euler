<?php
/**
 * Problem: By starting at the top of the triangle below and moving to adjacent
 * numbers on the row below, the maximum total from top to bottom is 23.
 *
 *                                 3
 *                                7 4
 *                               2 4 6
 *                              8 5 9 3
 *
 * That is, 3 + 7 + 4 + 9 = 23.
 *
 * Find the maximum total from top to bottom of 067-triangle.txt.
 *
 * NOTE: too big for brute force
 *
 * Solution: 1. Sum row[x][x] and row[x+1][x] and then sum row[x][x] and row[x+1][x+1]
 *              through each row from the bottom up
 *           2. Replace row[x][x] with the larger sum
 *           3. In the end, row[0][0] is the answer
 */

include "helper.php";

$rows = array();
$path_totals = array();

$numFile = fopen('./assets/067-triangle.txt', 'rb');

$contents = '';
while (!feof($numFile)) {
  $contents .= fread($numFile, 8192);
}
fclose($numFile);

$numbers = explode("\n", $contents);

foreach ($numbers as $key => $value) {
	$rows[$key] = explode(" ", trim(str_replace("\n", "", $value)));
}

for ($i=count($rows)-3; $i >=0 ; $i--) {
    foreach ($rows[$i] as $key => $value) {
        $biggest = $rows[$i][$key] + $rows[$i+1][$key];   // left
        $b = $rows[$i][$key] + $rows[$i+1][$key+1]; // right
        if ($b > $biggest) {
            $biggest = $b;
        }
        $rows[$i][$key] = $biggest;
    }
}

result(7273,$rows[0][0]);
