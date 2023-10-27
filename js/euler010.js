/*
  The sum of the primes below 10 is 2 + 3 + 5 + 7 = 17.

  Find the sum of all the primes below two million.
 */

var helper = require('./helper.js'),

    m,
    numbers = new Array(2000000),
    p = 2,
    result,

    MAX = numbers.length;

while (p < MAX) {

  numbers[p] = true;

  m = 2;
  while (m * p < MAX) {
    numbers[m++ * p] = false;
  }

  while (p < MAX && false === numbers[++p]) {}
}

result = numbers
  .reduce(function (acc, isPrime, num) {
    return isPrime ? acc + num : acc;
  }, 0);

helper(result);
