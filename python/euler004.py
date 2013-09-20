#!/usr/bin/python
from time import time
from math import floor
import sys
import helper
'''
Problem: A palindromic number reads the same both ways. The largest
palindrome made from the product of two 2-digit numbers is 9009 = 91 * 99.
Find the largest palindrome made from the product of two 3-digit numbers.

Solution: 1. Generate sorted sets of testable numbers
          2. Starting with the biggest, test each number for palindrome
          3. Exit when found or repeat with a lower set
'''

def isPal(number):
    number = str(number)
    num_len = len(number)
    num_half = len(number) / 2
    for x in range(0, num_half):
        if number[x] != number[num_len - x - 1]:
            return False

    helper.result('906609', number)
    sys.exit()

def makeSet(minx, maxx):
    numa = maxx
    numb = maxx
    numbers = []

    while numb >= minx:
        pal = numa * numb
        numbers.append(pal)
        if numa == numb:
            numa = maxx
            numb -= 1
        else:
            numa -= 1

    numbers.sort()

    return numbers

min_num = 900
max_num = 999

while min_num > 99:
    nums = makeSet(min_num, max_num)
    for x in range(len(nums) -1, 0, -1):
        is_a_pal = isPal(nums[x])

    min_num -= 100
    max_num -= 100
