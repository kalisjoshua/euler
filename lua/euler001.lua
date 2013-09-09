
-- If we list all the natural numbers below 10 that are multiples of
-- 3 or 5, we get 3, 5, 6 and 9. The sum of these multiples is 23.

-- Find the sum of all the multiples of 3 or 5 below 1000.

local ANSWER = 233168
local counter = 0
local limit = 1000
local sum = 0

while counter < limit do
  if counter % 3 == 0 or counter % 5 == 0 then
    sum = sum + counter
  end
  counter = counter + 1
end

if ANSWER == sum then
  print(true)
else
  print(sum)
end
