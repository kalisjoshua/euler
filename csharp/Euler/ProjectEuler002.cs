using System;
using System.Collections.Generic;
using System.Diagnostics;
using System.Linq;

namespace ProjectEulerMain
{
    class ProjectEuler002
    {
        /// <summary>
        /// Find the sum of all even numbers in a Fibionacci sequence, whose values do not exceed 4Million
        /// </summary>
        /// <param name="args"></param>
        public static void Euler2(string[] args)
        {
            Stopwatch stopwatch = Stopwatch.StartNew();

            Console.WriteLine("The sum of all even numbers in a fibonacci sequence (whose values do not exceed 4 Million) is {0}",
                EvenFibionacciNumbers());

            stopwatch.Stop();
            Console.WriteLine("The total time was {0} miliseconds", 
                stopwatch.ElapsedMilliseconds);
        }

        private static int EvenFibionacciNumbers()
        {
            int a = 0, b = 1;

            var evens = new List<int>();

            while(true)
            {
                int temp = a;
                a = b;
                b = temp + b;

                if (b > 4000000)
                    break;
                else if (b % 2 == 0)
                    evens.Add(b);
            }

            return evens.Sum();
        }
    }
}
