using System;
using System.Diagnostics;

namespace ProjectEulerMain
{
    class ProjectEuler003
    {
        /// <summary>
        /// Find the largest prime factor of the number 600,851,475,143
        /// </summary>
        /// <returns></returns>
        public static void Euler3(string[] args)
        {
            Stopwatch stopwatch = new Stopwatch();
            stopwatch.Start();

            Console.WriteLine("The largest prime factor of the number 600,851,475,143 is {0}", 
                MaxFactor());
            
            stopwatch.Stop();
            Console.WriteLine("The total time was {0} miliseconds", 
                stopwatch.ElapsedMilliseconds);
        }

        static private long MaxFactor()
        {
            long number = 600851475143;
            long k = 2;

            while (k * k <= number)
            {
                if (number % k == 0)
                    number /= k;
                else
                    ++k;
            }

            return number;
        }
    }
}
