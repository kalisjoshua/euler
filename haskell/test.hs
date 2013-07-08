

--factors n =
--  [quot n x | x <- [2..n], mod n x == 0]

--ff n =
--  head (factors n)

--isPrime n =
--  length (factors n) == 2

--primeFactors n =
--  head [quot n x | x <- [2..n], mod n x == 0, isPrime (quot n x)]

primeSieve :: [Integer]
primeSieve =
  sieve [2..]
  where
    sieve (p:xs) = p : sieve [x|x <- xs, x `mod` p > 0]


factors :: Integer -> [Integer]
factors n =
  [quot n x | x <- [2..(quot n 2)], mod n x == 0]


  --print (factors 100)
  --print (factors 2147483646)
  --print (factors 600851475143)


isPrime n
  | n <= 1 = False
  | elem n primes = True
  | length [x | x <- [3,5..], x * x < n] > 0 = False
  | otherwise = True
  where primes = [2,3,5,7,11,13,17,19,23,27,29]   -- short list of known primes
        check n = any (\a -> mod n a == 0) primes

test n =
  filter (\a, b -> mod n a == 0) (map (\a -> (a, a * a)) [3,5..n])
  --[x | x <- [3,5..n], x * x < n, mod n x == 0]