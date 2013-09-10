<?php
/**
 * Problem: If the numbers 1 to 5 are written out in words: one,
 * two, three, four, five, then there are 3 + 3 + 5 + 4 + 4 = 19
 * letters used in total.
 *
 * If all the numbers from 1 to 1000 (one thousand) inclusive were
 * written out in words, how many letters would be used?
 *
 * NOTE: Do not count spaces or hyphens. For example, 342 (three
 * hundred and forty-two) contains 23 letters and 115 (one hundred
 * and fifteen) contains 20 letters. The use of "and" when writing
 * out numbers is in compliance with British usage.
 *
 * Solution: Loop through numbers 1 to 999.  For each, split the digits.
 * For each digit, turn it into a word, being careful to account for
 * hundreds teens and zeros.  Turn each number back into the a grouping
 * of the words its digits were translated to.  Add up all the characters
 * as we go.  Add a char count for "ounthousand" at the end.
 */

include "helper.php";

function wordify($digit, $position)
{
	// Positions:
	//    0 = Ones
	//    1 = Tens
	//    2 = Hundreds
	//    3 = Thousands

	$ones = array('zero','one','two','three','four','five','six','seven','eight','nine');
	$tens = array('zero','teen','twenty','thirty','forty','fifty','sixty','seventy','eighty','ninety');

	switch ($position) {
		case 0:
		case 2:
		case 3:
			$word = $ones[$digit];
			if ($position == 2) {
				$word .= " hundred and";
			}
			if ($position == 3) {
				$word .= " thousand";
			}
			break;
		case 1:
			$word = $tens[$digit];
			break;
	}
	return $word;
}

function makeNumberWords($num)
{
	$teens = array(
		"zero" => "ten",
		"one" => "eleven",
		"teen" => "eleven",
		"two" => "twelve",
		"three" => "thirteen",
		"four" => "fourteen",
		"five" => "fifteen",
		"six" => "sixteen",
		"seven" => "seventeen",
		"eight" => "eighteen",
		"nine" => "nineteen"
		);
	$words = array();
	$digits = str_split((string) $num);
	$count = count($digits);
	$x = 0;
	for ($i=$count; $i > 0; $i--) {
		$word = wordify($digits[$i-1], $count - $i);
		if ($word == "teen") {
			$words[$x-1] = $teens[$words[$x-1]];
			$words[] = "";
		} else {
			$words[] = $word;
		}
		$x++;
	}

	return $words;
}

function countChars($term)
{
	if ((substr($term, 0, 9) == "zero zero") && (substr($term, -11) == "hundred and")) {
		$term = str_replace("hundred and", "hundred", $term);
	}
	$term = str_replace("zero", "", str_replace(" ", "", $term));
	$chars = strlen($term);

	return $chars;
}

$chars_total = 0;
for ($i=1; $i <= 999; $i++) {
	$chars_total += countChars(implode(' ',makeNumberWords($i)));
}
$chars_total += strlen("onethousand");

result("?", $chars_total);
