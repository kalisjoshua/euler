/*
  The sum of the primes below 10 is 2 + 3 + 5 + 7 = 17.

  Find the sum of all the primes below two million.
 */

var m,
    numbers = Array(2000000),
    p = 2,
    primes = [],
    seed,
    sum,

    MAX = numbers.length;

while (p < MAX) {

  numbers[p] = true;

  primes.push(p);

  m = 2;
  while (m * p < MAX) {
    numbers[m++ * p] = false;
  }

  while (p < MAX && false == numbers[++p]);
}

sum = primes
  .reduce(function (acc, p) {
    return acc + p;
  });

console.log(sum);