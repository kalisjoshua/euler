using System;
using System.Diagnostics;
using System.Linq;

namespace ProjectEulerMain
{
    class ProjectEuler004
    {
        /// <summary>
        /// Find the largest pallindromic numbers from the prodct of two three digit numbers
        /// </summary>
        /// <param name="args"></param>
        public static void Euler4(string[] args)
        {
            Stopwatch stopwatch = new Stopwatch();
            stopwatch.Start();

            var result = Enumerable.Range(100, 900).
                SelectMany(x => Enumerable.Range(x, 1000 - x).
                Select(y => x * y)).
                Where(IsPallindrome).
                Max();

            stopwatch.Stop();
            Console.WriteLine("The result is: {0}.", result);
            Console.WriteLine("The total time was {0} miliseconds",
                stopwatch.ElapsedMilliseconds);
        }

        static bool IsPallindrome(int number)
        {
            string s = number.ToString();
            return s.Reverse().SequenceEqual(s);
        }
    }
}
