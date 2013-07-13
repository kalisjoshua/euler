/*
  By listing the first six prime numbers:
  2, 3, 5, 7, 11, and 13, we can see that the 6th prime is 13.

  What is the 10 001st prime number?
 */
// 104743

var current;

function isPrime (num) {
  if (!!~isPrime.cache.indexOf(num)) {
    return true;
  }

  var result;

  result = isPrime.cache
    .reduce(function (a, prime) {
      return a && num % prime !== 0;
    }, true);

  if (result) {
    isPrime.cache.push(num);
  }

  return result;
}

isPrime.cache = [2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41];
current = 41;

while (isPrime.cache.length < 10001) {
  current += 2;
  isPrime(current);
}

console.log(current);
