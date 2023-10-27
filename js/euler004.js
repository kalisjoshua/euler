/*
  A palindromic number reads the same both ways. The largest palindrome made
  from the product of two 2-digit numbers is 9009 = 91 × 99.

  Find the largest palindrome made from the product of two 3-digit numbers.
 */

var helper = require('./helper.js'),

    one = 999,
    two = 999,
    level,
    result = one * two;

function isPal(num) {
  num = num.toString();

  return num === num
    .split('')
    .reverse()
    .join('');
}

while (!isPal(result)) {
  level = 1;
  while (!isPal(result) && level < 10) {
    result = one * (two - level++);
  }
  one--;
}

helper(result);
