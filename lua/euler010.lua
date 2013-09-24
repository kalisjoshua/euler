--[[
  The sum of the primes below 10 is 2 + 3 + 5 + 7 = 17.

  Find the sum of all the primes below two million.
  ]]

local helper = require("lua/helper")

local counter = 2
local length = 2000000
local multiple = 2
local primeMultiples = {}
local result = 0

while counter < length do
  if not primeMultiples[counter] then
    result = result + counter

    multiple = 2
    repeat
      primeMultiples[multiple * counter] = true
      multiple = multiple + 1
    until multiple * counter >= length
  end

  counter = counter + 1
end

helper(result)
