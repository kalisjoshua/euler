--[[
  By listing the first six prime numbers:
  2, 3, 5, 7, 11, and 13, we can see that the 6th prime is 13.

  What is the 10 001st prime number?
  ]]

local helper = require('lua/helper')

local count = 1
local number = 2
local prime

local function newSieve (mod, fn)
  return function (num)
    return fn(num) and num % mod > 0
  end
end

local sieve = newSieve(2, function (num) return num % 2 > 0 end)

repeat
  number = number + 1

  if sieve(number) then
    count = count + 1
    prime = number
    sieve = newSieve(number, sieve)
  end
until count == 10001

helper(104743, prime)
