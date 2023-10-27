/*
  The prime factors of 13195 are 5, 7, 13 and 29.

  What is the largest prime factor of the number 600851475143 ?
 */

var helper = require('./helper.js'),
    result;

function factors(num, i) {
  i = 2;

  while (num % i !== 0) {i++; }

  return [i]
    .concat((num / i > 1) ? factors(num / i) : []);
}

result = factors(600851475143)
  .pop();

helper(result);
