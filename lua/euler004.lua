--[[
  A palindromic number reads the same both ways. The largest palindrome made
  from the product of two 2-digit numbers is 9009 = 91 × 99.

  Find the largest palindrome made from the product of two 3-digit numbers.
  ]]

local helper = require("lua/helper").helper
local level

local one = 999
local two = 999

local product = one * two

function isPal (num)
  return string.lower(num) == string.reverse(string.lower(num))
end

while not isPal(product) do
  level = 1
  while not isPal(product) and level < 10 do
    level = level + 1
    product = one * (two - level)
  end
  one = one - 1
end

helper(906609, product)
