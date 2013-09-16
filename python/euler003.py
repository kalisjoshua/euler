#!/usr/bin/python
from time import time
from math import ceil, sqrt
import sys
import helper
'''
Problem: The prime factors of 13195 are 5, 7, 13 and 29.
What is the largest prime factor of the number 600851475143 ?

Solution: 1. Generate all the factors by lowest prime division
          2. Return the largest
'''
total    = 2
maxnum   = 4000000

def isPrime(num):
    if num == 1:
        return False

    if num == 2:
        return True

    if num % 2 == 0:
        return False

    square_of_num = int(ceil(sqrt(num)))
    for i in range(3, square_of_num):
        if num % i == 0:
            return False
        i = i + 2

    return True

def makeSieve(num, primes):

	sieve = []
	for i in range(primes[len(primes)-1]+1, num * num):
		sieve.append(0)

	for prime in primes:
		for i in range(prime, num, prime):
			sieve[i] = 1

 	return sieve

def reducer(num, sieve, primes, target):
 	negSieve = makeSieve(num, primes)

	new = primes
	for key in range(len(negSieve)):
		if negSieve[key] == 0 and isPrime(key):
			if key not in primes:
				new.append(key)


	return new

def factorize(target, primes, factor):
    multiplier = 2
    factored = True
    sieve = range(primes[len(primes)-1]+1, factor)
    for i in range(0, len(primes)):
        if target % primes[i] == 0:
            target = target / primes[i]
            print target
            if isPrime(target):
                helper.result(6857, target)
                sys.exit()
        if i == len(primes) - 1:
            factored = False
            factor = factor * multiplier
            primes = reducer(factor, sieve, primes, target)
            factorize(target, primes, factor)
        i += 1

primes = [2]
factor = 5
target = 600851475143

factorize(target, primes, factor)
