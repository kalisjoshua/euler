using System;
using System.Collections.Generic;
using System.Diagnostics;
using System.Linq;

namespace ProjectEulerMain
{
    class ProjectEuler006
    {
        /// <summary>
        /// Find the difference between the sum of squares, and the square of sums, of the first 100 natural numbers
        /// </summary>
        /// <param name="args"></param>
        public static void Euler6(string[] args)
        {
            Stopwatch stopwatch = new Stopwatch();
            stopwatch.Start();

            long sumOfSquares = SumOfSquares(100);
            long squareOfSums = SquareOfSums(100);
            
            stopwatch.Stop();
            Console.WriteLine("The difference between the sum of squares and the square of sums for the first 100 naural numbers is {0}.",
                Math.Abs(sumOfSquares - squareOfSums));
            Console.WriteLine("The total time was {0} miliseconds", 
                stopwatch.ElapsedMilliseconds);
        }

        static long SumOfSquares(int n)
        {
            List<long> listOfSquares = new List<long>();
            int j;

            for (int i = 1; i <= n; i++)
            {
                j = i * i;
                listOfSquares.Add(j);
            }

            return listOfSquares.Sum();
        }

        static long SquareOfSums(int n)
        {
            List<long> listOfSums = new List<long>();

            for (int i = 1; i <= n; i++)
            {
                listOfSums.Add(i);
            }

            return listOfSums.Sum() * listOfSums.Sum();
        }
    }
}
