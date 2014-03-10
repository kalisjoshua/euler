/*
  The following iterative sequence is defined
  for the set of positive integers:

    n -> n/2 (n is even)
    n -> 3n + 1 (n is odd)

  Using the rule above and starting with 13,
  we generate the following sequence:

    13 -> 40 -> 20 -> 10 -> 5 -> 16 -> 8 -> 4 -> 2 -> 1

  It can be seen that this sequence (starting at 13 and finishing at 1) contains
  10 terms. Although it has not been proved yet (Collatz Problem), it is thought
  that all starting numbers finish at 1.

  Which starting number, under one million, produces the longest chain?

  NOTE: Once the chain starts the terms are allowed to go above one million.
 */

var helper = require('./helper.js'),

    num = 1000000,
    result = [0, 0],
    len;

function collatz(num, count) {
  return num === 1 ? count : (num % 2 === 0) ?
    collatz(num / 2, count + 1) :
    collatz(3 * num + 1, count + 1);
}

while (--num) {
  len = collatz(num, 0);

  if (len > result[1]) {
    result = [num, len];
  }
}

helper(result[0]);
