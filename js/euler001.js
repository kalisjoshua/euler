/*
  If we list all the natural numbers below 10 that are multiples of
  3 or 5, we get 3, 5, 6 and 9. The sum of these multiples is 23.

  Find the sum of all the multiples of 3 or 5 below 1000.
  */

var helper = require('./helper.js'),
    result;

// Better answer
result = Array.apply(0, new Array(1000))
  .reduce(function (a, _, i) {
    return a + (!(i % 3 && i % 5) ? i : 0);
  }, 0);

helper(result);
