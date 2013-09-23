/*
  Let d(n) be defined as the sum of proper divisors of n
  (numbers less than n which divide evenly into n).

  If d(a) = b and d(b) = a, where a ≠ b, then a and b are an amicable
  pair and each of a and b are called amicable numbers.

  For example, the proper divisors of 220 are 1, 2, 4, 5, 10, 11, 20, 22, 44, 55
  and 110; therefore d(220) = 284. The proper divisors of 284 are 1, 2, 4, 71
  and 142; so d(284) = 220.

  Evaluate the sum of all the amicable numbers under 10000.
 */

var cache = {},
    helper = require('./helper.js'),
    i = 1,
    result = [],
    temp;

function amicable (a) {
  var b;

  function d (num) {
    return sum(divisors(num));
  }

  b = d(a);

  return b !== a && d(b) === a ? [a, b] : false;
}

function divisors (num) {
  var i = 2,
      list = [];

  function push (n) {
    !~list.indexOf(n) && list.push(n)
  }

  push(1);

  while (i < num / 2) {
    if (num % i === 0) {
      push(i);
      push(num / i);
    }

    i = i + 1;
  }

  return list
    .sort(function (a, b) {
      return a - b;
    });
}

function sum (list) {
  return eval(list.join('+'));
}

while (i < 10000) {
  temp = !cache[i] ? amicable(i) : false;

  if (temp) {
    cache[temp[0]] = true;
    cache[temp[1]] = true;

    result = result
      .concat(temp);
  }

  i = i + 1;
}

result = sum(result);

helper(result);
