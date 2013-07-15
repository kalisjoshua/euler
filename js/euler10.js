/*
  The sum of the primes below 10 is 2 + 3 + 5 + 7 = 17.

  Find the sum of all the primes below two million.
 */

var m,
    p,
    primes,
    seed,
    sum,
    two_mil = 2000000;

primes = Array(two_mil);

p = 2;
while (p < two_mil) {

  primes[p] = true;

  m = 2;
  while (m * p < two_mil) {
    primes[m++ * p] = false;
  }

  while (primes[++p] == false && p < two_mil);
}

primes = primes
  .map(function (item, indx) {
    return !!item ? indx : false; 
  })
  .filter(function (item) {
    return item;
  });

eval("sum = " + primes.join("+"));

console.log(sum);