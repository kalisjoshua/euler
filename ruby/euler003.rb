# The prime factors of 13195 are 5, 7, 13 and 29.
#
# What is the largest prime factor of the number 600851475143 ?

def factor (num)
  div = 2

  while num % div != 0
    div += 1
  end

  return [div]
    .concat((num / div > 1) ? factor(num / div) : [])
end

puts (factor 600851475143).max
