--[[
  The sum of the squares of the first ten natural numbers is,

  12 + 22 + ... + 102 = 385

  The square of the sum of the first ten natural numbers is,

  (1 + 2 + ... + 10)2 = 552 = 3025

  Hence the difference between the sum of the squares of the first
  ten natural numbers and the square of the sum is 3025  385 = 2640.

  Find the difference between the sum of the squares of the
  one hundred natural numbers and the square of the sum.
  ]]

local helper = require('lua/helper')
local limit = 100
local result = {0, 0}

while limit > 0 do
  result = {result[1] + limit * limit, result[2] + limit}
  limit = limit - 1
end

result = result[2] ^ 2 - result[1]

helper(result);
