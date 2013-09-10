/*
  If we list all the natural numbers below 10 that are multiples of
  3 or 5, we get 3, 5, 6 and 9. The sum of these multiples is 23.

  Find the sum of all the multiples of 3 or 5 below 1000.
  */

var helper = require('./helper.js'),
    limit = 1000,
    result = 0;

// An answer
while (limit--) {
  if (limit % 3 === 0 || limit % 5 === 0) {
    result += limit;
  }
}

helper(233168, result);
