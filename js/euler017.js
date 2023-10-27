/*
  If the numbers 1 to 5 are written out in words: one, two, three, four, five,
  then there are 3 + 3 + 5 + 4 + 4 = 19 letters used in total.

  If all the numbers from 1 to 1000 (one thousand) inclusive were written out in
  words, how many letters would be used?
  
  NOTE: Do not count spaces or hyphens. For example, 342 (three hundred and
  forty-two) contains 23 letters and 115 (one hundred and fifteen) contains 20
  letters. The use of "and" when writing out numbers is in compliance with
  British usage.
  */

var helper = require('./helper.js'),
    limit = 1000,
    result = 0,
    words;

function addWord(words, num) {
  var result = 0;

  if (num > 999) {
    result += 11; // 'one thousand'.length === 11
    num = 0;
  }

  if (num > 99) {
    result += words.singles[~~(num / 100)] + 7;
    num = num % 100;
    result += num ? 3 : 0;
  }

  if (num > 19) {
    result += words.doubles[~~(num / 10)];
    num = num % 10;
  }

  result += words.singles[num];

  return result;
}

words = {
  doubles: [
    0, // zero
    0, // tens
    6, // twenty
    6, // thirty
    5, // forty
    5, // fifty
    5, // sixty
    7, // seventy
    6, // eighty
    6  // ninety
  ],
  singles: [
    0, // zero
    3, // one
    3, // two
    5, // three
    4, // four
    4, // five
    3, // six
    5, // seven
    5, // eight
    4, // nine
    3, // ten
    6, // eleven
    6, // twelve
    8, // thirteen
    8, // fourteen
    7, // fifteen
    7, // sixteen
    9, // seventeen
    8, // eighteen
    8  // nineteen
  ]
};

while (limit) {
  result += addWord(words, limit--);
}

helper(result);
