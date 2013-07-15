/*
  2520 is the smallest number that can be divided by each
  of the numbers from 1 to 10 without any remainder.

  What is the smallest positive number that is evenly
  divisible by all of the numbers from 1 to 20?
 */

var ANSWER = 232792560,

    counter = 2560 * 11 * 13 * 17 * 19;

while (!(
  counter % 2 === 0 &&
  counter % 3 === 0 &&
  // counter % 4 === 0 &&
  counter % 5 === 0 &&
  // counter % 6 === 0 &&
  counter % 7 === 0 &&
  counter % 8 === 0 &&
  counter % 9 === 0 &&
  // counter % 10 === 0 &&
  counter % 11 === 0 &&
  counter % 12 === 0 &&
  counter % 13 === 0 &&
  // counter % 14 === 0 &&
  // counter % 15 === 0 &&
  // counter % 16 === 0 &&
  counter % 17 === 0 &&
  // counter % 18 === 0 &&
  counter % 19 === 0
  // counter % 20 === 0
  )) {
  counter++;
}

console.log(ANSWER === counter);