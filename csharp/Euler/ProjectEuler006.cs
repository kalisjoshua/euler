using System;
using System.Collections.Concurrent;
using System.Collections.Generic;
using System.Diagnostics;
using System.Linq;
using System.Threading.Tasks;

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
            Stopwatch stopwatch = Stopwatch.StartNew();

            long sumOfSquares = SumOfSquares(), 
                 squareOfSums = SquareOfSums();
            
            stopwatch.Stop();
            Console.WriteLine("The difference between the sum of squares and the square of sums for the first 100 naural numbers is {0}.",
                Math.Abs(sumOfSquares - squareOfSums));
            Console.WriteLine("The total time was {0} miliseconds", 
                stopwatch.ElapsedMilliseconds);
        }

        private static long SumOfSquares()
        {
            var listOfSquares = new BlockingCollection<long>();
            int j;

            Parallel.For(1, 101, i =>
            {
                j = i * i;
                listOfSquares.Add(j);
            });

            return listOfSquares.Sum();
        }

        private static long SquareOfSums()
        {
            var listOfSums = new BlockingCollection<long>();

            Parallel.For(1, 101, i =>
            {
                listOfSums.Add(i);
            });

            return listOfSums.Sum() * listOfSums.Sum();
        }
    }
}
