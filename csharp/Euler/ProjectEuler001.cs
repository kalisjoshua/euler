using System;
using System.Collections.Concurrent;
using System.Diagnostics;
using System.Linq;
using System.Threading.Tasks;

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
            Stopwatch stopwatch = Stopwatch.StartNew();
            var multiples = new BlockingCollection<int>();

            Parallel.For(0, 1000, i =>
            {
                if (i % 3 == 0 || i % 5 == 0)
                    multiples.Add(i);
            });

            int sumOfMultiples = multiples.Sum();

            stopwatch.Stop();
            Console.WriteLine("The sum of all multipels of 3 or 5 below 1000 is {0}", 
                sumOfMultiples);
            Console.WriteLine("The total time was {0} miliseconds", 
                stopwatch.ElapsedMilliseconds);
        }
    }
}
