#!/usr/bin/python

'''
Problem: Find the sum all all numbers that are multiples of 3
or 5 from 1 to 999
Solution: Sum all the multiples of 3, sum all the multiples
of 5, add them together, sum all the multiples of 15, and
subtract.
'''

def sumMultiplesOf(x):
	num = 0
	tot = 0

	while (num <= 999):
		if (num % x == 0):
			tot += num
		num += 1

	return tot

newTot = sumMultiplesOf(3) + sumMultiplesOf(5) - sumMultiplesOf(15)
print "Sum is " + str(newTot) + "\n"
