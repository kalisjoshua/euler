#!/usr/bin/python
from time import time

global start_time
start_time = time()

def result(real_answer, answer):
	end_time = time() - start_time
	if real_answer == answer:
		print "Success!"
		print "Total time, " + str(round(end_time, 4)) + " seconds."
	else:
		print "Keep trying"
		print answer
