/*
  A palindromic number reads the same both ways. The largest palindrome made
  from the product of two 2-digit numbers is 9009 = 91 × 99.

  Find the largest palindrome made from the product of two 3-digit numbers.
 */

var ANSWER = 906609,

    one = 999,
    two = 999,
    level,
    product = one * two;

function isPal (num) {
  num = num.toString();

  return num === num
    .split("")
    .reverse()
    .join("");
}

while (!isPal(product)) {
  level = 1;
  while (!isPal(product) && level < 10) {
    product = one * (two - level++);
  }
  one--;
}

console.log(ANSWER === product);
