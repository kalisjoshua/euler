<?php
/**
 * Problem: You are given the following information, but you may prefer to do some research for yourself.
 *
 * 1 Jan 1900 was a Monday.
 * Thirty days has September,
 * April, June and November.
 * All the rest have thirty-one,
 * Saving February alone,
 * Which has twenty-eight, rain or shine.
 * And on leap years, twenty-nine.
 * A leap year occurs on any year evenly divisible by 4, but not on a century unless it is divisible by 400.
 * How many Sundays fell on the first of the month during the twentieth century (1 Jan 1901 to 31 Dec 2000)?
 *
 * Solution: Start with 366 days since our known constant (1.1.1901 == Monday) and
 * loop through each month of each year, dividing by 7 and checking if it is a Sunday.
 */

include "helper.php";

$days = array('su', 'mo', 'tu', 'we', 'th', 'fr', 'sa');
$sundays = 0;
$day_num = 366;
for ($i=1901; $i <= 2000 ; $i++) {
	$months = array(31,28,31,30,31,30,31,31,30,31,30,31);
	if (($i%400==0) || (($i%100!=0) && ($i%4==0))) {
		$months[1] = 29; // leap year
	}
	foreach ($months as $m => $d) {
		if ($days[($day_num%7)]=='su') {
			$sundays++;
		}
		$day_num += $d;
	}
	// $sundays += countSundays($i, $leap);
}

result(171, $sundays);
