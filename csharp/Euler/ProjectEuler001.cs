using System;
using System.Collections.Generic;
using System.Diagnostics;
using System.Linq;

namespace ProjectEulerMain
{
    class ProjectEuler001
    {
        /// <summary>
        /// Find the sum of all multiples of 3 or 5 below 1000
        /// </summary>
        /// <param name="args"></param>
        public static void Euler1(string[] args)
        {
            Stopwatch stopwatch = new Stopwatch();
            stopwatch.Start();

            List<int> multiples = new List<int>();

            for (int i = 1; i < 1000; i++)
            {
                if (i % 3 == 0 || i % 5 == 0)
                {
                    multiples.Add(i);
                }
            }

            int sumOfMultiples = multiples.Sum();

            stopwatch.Stop();
            Console.WriteLine("The sum of all multipels of 3 or 5 below 1000 is {0}", 
                sumOfMultiples);
            Console.WriteLine("The total time was {0} miliseconds", 
                stopwatch.ElapsedMilliseconds);
        }
    }
}
