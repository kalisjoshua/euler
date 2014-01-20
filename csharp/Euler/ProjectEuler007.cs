using System;
using System.Collections.Generic;
using System.Diagnostics;
using System.Linq;

namespace ProjectEulerMain
{
    class ProjectEuler007
    {
        /// <summary>
        /// Find the 10,001st prime number
        /// </summary>
        /// <param name="args"></param>
        public static void Euler7(string[] args)
        {
            Stopwatch stopwatch = new Stopwatch();
            stopwatch.Start();

            Console.WriteLine("The 10,001st prime number is {0}.", 
                FindThePrime());

            stopwatch.Stop();
            Console.WriteLine("The total time was {0} miliseconds", 
                stopwatch.ElapsedMilliseconds);
        }

        static long FindThePrime()
        {
            List<long> primes = new List<long>();
            int count = 1;
            int i = 1;

            while(count <= 10001)
            {
                if (IsPrime(i))
                {
                    primes.Add(i);
                    count++;
                }
                i++;
            }
            return primes.Max();
        }

        static bool IsPrime(int number)
        {
            if ((number & 1) == 0)
            {
                if (number == 2)
                    return true;
                else
                    return false;
            }

            for (int i = 3; (i * i) <= number; i += 2)
            {
                if ((number % i) == 0)
                    return false;
            }
            return number != 1;
        }
    }
}
