--[[
  2520 is the smallest number that can be divided by each
  of the numbers from 1 to 10 without any remainder.

  What is the smallest positive number that is evenly
  divisible by all of the numbers from 1 to 20?
  ]]

local helper = require("lua/helper").helper

local counter = 2560 * 11 * 13 * 17 * 19;

while not (
  counter % 2 == 0 and
  counter % 3 == 0 and
  -- counter % 4 == 0 and
  counter % 5 == 0 and
  -- counter % 6 == 0 and
  counter % 7 == 0 and
  counter % 8 == 0 and
  counter % 9 == 0 and
  -- counter % 10 == 0 and
  counter % 11 == 0 and
  counter % 12 == 0 and
  counter % 13 == 0 and
  -- counter % 14 == 0 and
  -- counter % 15 == 0 and
  -- counter % 16 == 0 and
  counter % 17 == 0 and
  -- counter % 18 == 0 and
  counter % 19 == 0
  -- counter % 20 == 0
  ) do
  counter = counter + 1
end

helper(232792560, counter)
