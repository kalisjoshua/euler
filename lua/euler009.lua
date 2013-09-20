--[[
  A Pythagorean triplet is a set of three
  natural numbers, a < b < c, for which,

      a^2 + b^2 = c^2

  For example, 3^2 + 4^2 = 9 + 16 = 25 = 5^2.

  There exists exactly one Pythagorean triplet for
  which a + b + c = 1000. Find the product abc.
  ]]

local helper = require("lua/helper")

local a = 200
local b = a + 1
local t = 0
local lim =1000

local function c (a, b)
  return math.sqrt(a*a + b*b)
end

while not (a + b + c(a, b) == lim) do
  t = t + 1
  b = b + 1
  if b > lim then
    a = a + 1
    b = a + 1
  end
end
-- a*a + b*b = c^2 => c = Math.sqrt(a*a + b*b)
-- a + b + c = 1000 => a + b + Math.sqrt(a*a + b*b) = 1000

local result = a * b * c(a, b)

helper(31875000, result)
