/*
  Problem: 2^15 = 32768 and the sum of its digits is 3 + 2 + 7 + 6 + 8 = 26.

  What is the sum of the digits of the number 2^1000?
  */

var LIMIT = 1000,

    count = 1,
    helper = require('./helper.js'),
    result = 1;

// acc[0] - carries from previous doubling
// acc[1] - accumulates the resulting number
function doublingReduce(acc, num) {
  num = num * 2 + acc[0];

  acc[0] = +(num >= 10);
  acc[1] = ('' + num % 10) + acc[1];

  return acc;
}

do {
  result = ('' + result)
    .split('')
    .reduceRight(doublingReduce, [0, '']);

  result = result[0] ? result.join('') : result[1];
} while (count++ < LIMIT);

/*jshint evil:true*/
result = eval(result.split('').join('+'));

helper(result);