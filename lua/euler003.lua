
-- The prime factors of 13195 are 5, 7, 13 and 29.

-- What is the largest prime factor of the number 600851475143 ?

local ANSWER = 6857
local number = 600851475143

function factors (num)
  local i = 2

  while (num % i ~= 0) do
    i = i + 1
  end

  if (num / i > 1) then
    return factors(num / i)
  else
    return num
  end
end

local result = factors(number)

if ANSWER == result then
  print(true)
else
  print(result)
end
