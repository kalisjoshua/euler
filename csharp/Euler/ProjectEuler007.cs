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
        /// Find the 10,001st prime number.
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

        // Start with a close bounding value, to keep the 
        // sieve from taking longer than needed.
        private const long limit = int.MaxValue / 16384;
        private static PrimeGenerator generator = new PrimeGenerator(limit);

        private static long FindThePrime()
        {
            return generator.GenNextPrime().Skip(10000).Take(1).First();
        }

        public class PrimeGenerator
        {
            private readonly long _limit;
            private readonly bool[] _isPrime;

            public PrimeGenerator(long limit)
            {
                _limit = limit;
                _isPrime = new bool[_limit];

                // Initialize the sieve to true.
                for (var i = 0L; i < _limit; i++)
                {
                    _isPrime[i] = true;
                }
            }

            public IEnumerable<long> GenNextPrime()
            {
                for (var candidate = 2L; candidate < _limit; candidate++)
                {
                    // Every true canditate is prime, because every multiple
                    // of the previous candidate is marked false.
                    if (!_isPrime[candidate])
                        continue;

                    yield return candidate;

                    // This section is parallellizable, but with a small sieve the performance
                    // with parallelization is less than the performance with a single thread.
                    for (var multiple = candidate * candidate; multiple < _limit; multiple += candidate)
                    {
                        _isPrime[multiple] = false;
                    }
                }
            }
        }
    }
}
