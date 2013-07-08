/*
  The sum of the squares of the first ten natural numbers is,

  12 + 22 + ... + 102 = 385

  The square of the sum of the first ten natural numbers is,

  (1 + 2 + ... + 10)2 = 552 = 3025

  Hence the difference between the sum of the squares of the first
  ten natural numbers and the square of the sum is 3025  385 = 2640.

  Find the difference between the sum of the squares of the 
  one hundred natural numbers and the square of the sum.
  */
// 25164150

// Original Answer
Math
  .pow(Array
    .apply(null, Array(101))
    .reduce(function (a, _, i) {
      return a + i;
    }, 0), 2) -
    Array
      .apply(null, Array(101))
      .reduce(function (a, _, i) {
        return a + i * i;
      }, 0);

// Refactor #1 - single statement
(function (x) {
  return Math.pow(x.reduce(function (a, _, i) {
      return ~~a + i;
    }), 2) -
    x.reduce(function (a, _, i) {
      return ~~a + i * i;
    });
}(Array.apply(null, Array(101))));

// Refactor #2 - single statement
Array.apply(null, Array(101))
  .reduce(function (a, _, i) {
    return [a[0] + i * i, a[1] + i];
  }, [0,0])
  .reduce(function (a, b) {
    return Math.pow(b, 2) - a;
  });


// Code Golf!
// Original answer
// Math.pow(Array.apply(null, Array(101)).reduce(function (a, _, i) {return a + i;}, 0), 2) -Array.apply(null, Array(101)).reduce(function (a, _, i) {return a + i * i;}, 0);
// Refactor #1 - single statement
// (function (x) {return Math.pow(x.reduce(function (a, _, i) {return ~~a + i;}), 2) -x.reduce(function (a, _, i) {return ~~a + i * i;});}(Array.apply(null, Array(101))));
// multi-statement
// x = Array.apply(null, Array(101)); Math.pow(x.reduce(function (a, _, i) {return ~~a + i;}), 2) - x.reduce(function (a, _, i) {return ~~a + i * i;});
// Refactor #2 - single statement
// Array.apply(null, Array(101)).reduce(function (a, _, i) {return [a[0] + i * i, a[1] + i]}, [0,0]).reduce(function (a, b) {return Math.pow(b, 2) - a});
// multi-statement
// x = Array.apply(null, Array(101)).reduce(function (a, _, i) {return [a[0] + i * i, a[1] + i]}, [0,0]); Math.pow(x[1], 2) - x[0];
// x=Array.apply(null,Array(101)).reduce(function(a,_,i){return[a[0]+i*i,a[1]+i]},[0,0]);Math.pow(x[1],2)-x[0];
// x=Array.apply(null,Array(101)).reduce(function(a,_,i){return[a[0]+i*i,a[1]+i]},[0,0]);x[1]*x[1]-x[0];