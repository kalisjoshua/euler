#!/usr/bin/python
import helper
'''
2^15 = 32768 and the sum of its digits is 3 + 2 + 7 + 6 + 8 = 26.

What is the sum of the digits of the number 2^1000?
'''

number = 2**1000
result = 0

while (number > 0):
  result = result + number % 10
  number = number / 10

helper.result(1366, result)
