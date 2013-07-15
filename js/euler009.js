/*
  A Pythagorean triplet is a set of three
  natural numbers, a < b < c, for which,

      a^2 + b^2 = c^2

  For example, 3^2 + 4^2 = 9 + 16 = 25 = 5^2.

  There exists exactly one Pythagorean triplet for
  which a + b + c = 1000. Find the product abc.
 */

var ANSWER = 31875000,

    a = 200,
    b = a + 1,
    t = 0,
    lim = 1000;

function c (a, b) {
  return Math.sqrt(a*a + b*b);
}

while (a + b + c(a, b) !== lim) {
  t++;
  if (b++ > lim) {
    b = ++a + 1;
  }
}
// a*a + b*b = c^2 => c = Math.sqrt(a*a + b*b)
// a + b + c = 1000 => a + b + Math.sqrt(a*a + b*b) = 1000

console.log(ANSWER === a * b * c(a, b));
