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
 * Find the maximum total from top to bottom of the triangle below:
 *
 *                               75
 *                              95 64
 *                             17 47 82
 *                            18 35 87 10
 *                           20 04 82 47 65
 *                          19 01 23 75 03 34
 *                         88 02 77 73 07 63 67
 *                        99 65 04 28 06 16 70 92
 *                       41 41 26 56 83 40 80 70 33
 *                      41 48 72 33 47 32 37 16 94 29
 *                     53 71 44 65 25 43 91 52 97 51 14
 *                    70 11 33 28 77 73 17 78 39 68 17 57
 *                   91 71 52 38 17 14 91 43 58 50 27 29 48
 *                  63 66 04 68 89 53 67 30 73 16 69 87 40 31
 *                 04 62 98 27 23 09 70 98 73 93 38 53 60 04 23
 *
 * NOTE: As there are only 16384 routes, it is possible to solve this problem
 * by trying every route. However, Problem 67, is the same challenge with a triangle
 * containing one-hundred rows; it cannot be solved by brute force, and requires a clever method! ;o) *
 *
 * Solution: 1. Sum row[x][x] and row[x+1][x] and then sum row[x][x] and row[x+1][x+1]
 *              through each row from the bottom up
 *           2. Replace row[x][x] with the larger sum
 *           3. In the end, row[0][0] is the answer
 */

include "helper.php";

// Test pattern
// $numbers = <<<NUMS
//                                 3
//                                7 4
//                               2 4 6
//                              8 5 9 3
// NUMS;

$numbers = <<<NUMS
                               75
                              95 64
                             17 47 82
                            18 35 87 10
                           20 04 82 47 65
                          19 01 23 75 03 34
                         88 02 77 73 07 63 67
                        99 65 04 28 06 16 70 92
                       41 41 26 56 83 40 80 70 33
                      41 48 72 33 47 32 37 16 94 29
                     53 71 44 65 25 43 91 52 97 51 14
                    70 11 33 28 77 73 17 78 39 68 17 57
                   91 71 52 38 17 14 91 43 58 50 27 29 48
                  63 66 04 68 89 53 67 30 73 16 69 87 40 31
                 04 62 98 27 23 09 70 98 73 93 38 53 60 04 23
NUMS;

$rows = array();
$path_totals = array();

$numbers = explode("\n", $numbers);

foreach ($numbers as $key => $value) {
	$rows[$key] = explode(" ", trim(str_replace("\n", "", $value)));
}

// Just print our pyramid for visibility
$spaces = count($rows);
foreach ($rows as $row => $group) {
    for ($i=0; $i < $spaces; $i++) {
        echo " ";
    }
    foreach ($group as $key => $num) {
        echo $num . " ";
    }
    echo "\n";
    $spaces--;
}

// Now lets add stuff
for ($i=count($rows)-2; $i >=0 ; $i--) {
    foreach ($rows[$i] as $key => $value) {
        $biggest = $rows[$i][$key] + $rows[$i+1][$key];   // left
        $b = $rows[$i][$key] + $rows[$i+1][$key+1]; // right
        if ($b > $biggest) {
            $biggest = $b;
        }
        $rows[$i][$key] = $biggest;
    }
}
result(1074,$rows[0][0]);
