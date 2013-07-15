/*
  A Pythagorean triplet is a set of three
  natural numbers, a < b < c, for which,

      a^2 + b^2 = c^2

  For example, 3^2 + 4^2 = 9 + 16 = 25 = 5^2.

  There exists exactly one Pythagorean triplet for
  which a + b + c = 1000. Find the product abc.
 */
// 31875000

var a = 3,
    b = 4,

    lim = 1000;

function c (a, b) {
  return Math.sqrt(a*a + b*b);
}

function product (a, b) {
  return a * b * c(a, b);
}

while (a + b + c(a, b) !== lim) {
  if (b++ > lim) {
    b = a++ + 1;
  }
}
// a + b + c = 1000
// a^2 + b^2 = c^2
// ...
// a + b + Math.sqrt(a^2 + b^2) = 1000

console.log(product(a, b));
