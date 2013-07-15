/*
  The sum of the primes below 10 is 2 + 3 + 5 + 7 = 17.

  Find the sum of all the primes below two million.
 */
// 142913828922

var m,
    numbers = Array(2000000),
    p = 2,
    seed,
    sum,

    MAX = numbers.length;

while (p < MAX) {

  numbers[p] = true;

  m = 2;
  while (m * p < MAX) {
    numbers[m++ * p] = false;
  }

  while (p < MAX && false == numbers[++p]);
}

sum = numbers
  .reduce(function (acc, isPrime, num) {
    return isPrime ? acc + num : acc;
  }, 0);

console.log(sum);