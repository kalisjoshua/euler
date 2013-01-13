/*
  If we list all the natural numbers below 10 that are multiples of
  3 or 5, we get 3, 5, 6 and 9. The sum of these multiples is 23.

  Find the sum of all the multiples of 3 or 5 below 1000.
  */

// Better answer
Array.apply(0, Array(1000))
  .reduce(function (a, _, i) {
    return a + (!(i % 3) || !(i % 5) ? i : 0);
  }, 0);

// An answer
(function (limit, sum) {
  while (limit--) {
    if (limit % 3 === 0 || limit % 5 === 0) {
      sum+=limit;
    }
  }
  return sum;
}(1000, 0));