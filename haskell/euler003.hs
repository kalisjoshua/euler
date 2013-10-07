isPrime n
  | n <= 1 = False
  | elem n set = True
  | otherwise = False
  where set = [2,3,5,7,11,13,17,19,23]

rev n =
  any (\a -> mod a n) [1..10]
  