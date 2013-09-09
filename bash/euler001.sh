#!/bin/bash

#If we list all the natural numbers below 10 that are multiples of 3 or 5, we get 3, 5, 6 and 9. The sum of these multiples is 23.
#Find the sum of all the multiples of 3 or 5 below 1000.

start=1
end=999

result=0
expectedResult=233168

for (( i=$start; i<=$end; i++ )); do
    if [ $(($i % 3)) -eq 0 ] || [ $(($i % 5)) -eq 0 ]; then
	result=$(($i+result))
    fi
done

echo "Expected result: $expectedResult"
echo "Actual result:   $result"
