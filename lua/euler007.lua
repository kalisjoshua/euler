--[[
  By listing the first six prime numbers:
  2, 3, 5, 7, 11, and 13, we can see that the 6th prime is 13.

  What is the 10 001st prime number?
  ]]

local helper = require('lua/helper')

local counter = 1
local primes = {2}

local function isMultiple (mod, fun)
  return function (num)
    return num % mod == 0 or fun(num)
  end
end

local sieve = isMultiple(2, function () return false end)

repeat
  counter = counter + 1

  if not sieve(counter) then
    table.insert(primes, counter)
    sieve = isMultiple(counter, sieve)
  end
until #primes == 10001

helper(104743, primes[#primes])
