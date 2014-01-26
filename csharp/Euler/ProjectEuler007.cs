using System;
using System.Collections.Concurrent;
using System.Collections.Generic;
using System.Diagnostics;
using System.Linq;
using System.Threading.Tasks;

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
            Stopwatch stopwatch = Stopwatch.StartNew();

            Console.WriteLine("The 10,001st prime number is {0}.", 
                FindThePrime());

            stopwatch.Stop();
            Console.WriteLine("The total time was {0} miliseconds", 
                stopwatch.ElapsedMilliseconds);
        }

        private static long FindThePrime()
        {
            var primes = new ConcurrentQueue<long>();
            var theCollection = new BlockingCollection<long>(primes);
            var number = 1;
            var key = new object();

            Parallel.For(1, 110000, (i, loopState) =>
            {
                lock (key)
                {
                    if (IsPrime(number))
                        theCollection.Add(number);
                    
                    number++;
                }

                if (theCollection.Count == 10001)
                    loopState.Break();
            });

            return theCollection.Max();
        }

        private static bool IsPrime(long number)
        {
            if ((number & 1) == 0)
                if (number == 2)
                    return true;
                else
                    return false;

            for (int i = 3; (i * i) <= number; i += 2)
                if ((number % i) == 0)
                    return false;

            return number != 1;
        }
    }
}
