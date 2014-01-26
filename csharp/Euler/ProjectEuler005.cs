using System;
using System.Diagnostics;
using System.Linq;

namespace ProjectEulerMain
{
    class ProjectEuler005
    {
        /// <summary>
        /// Find the smallest multiple that is divisable by all numbers from 1 to 20
        /// </summary>
        /// <param name="args"></param>
        public static void Euler5(string[] args)
        {
            Stopwatch stopwatch = Stopwatch.StartNew();

            int[] nums = Enumerable.Range(1, 20).ToArray();
            int lcm = 1;

            for (int i = 0; i < nums.Length; i++)
                lcm = LCM(lcm, nums[i]);

            stopwatch.Stop();
            Console.WriteLine("The smallest multiple that is divisable by 1 through 20 is {0}", lcm);
            Console.WriteLine("The total time was {0} miliseconds", 
                stopwatch.ElapsedMilliseconds);
        }

        private static int LCM(int value1, int value2)
        {
            int a = Math.Abs(value1);
            int b = Math.Abs(value2);

            a = checked((a / GCD(a, b)));
            
            return checked((a * b));
        }

        private static int GCD(int value1, int value2)
        {
            int a = Math.Abs(value1);
            int b = Math.Abs(value2); 

            int gcd = 1;

            if(value1 == 0 || value2 == 0)
                throw new ArgumentOutOfRangeException();

            if (a == b)
                return a;
            if (a > b && a % b == 0)
                return b;
            
            if (b > a && b % a == 0)
                return a;

            while (b != 0)
            {
                gcd = b;
                b = a % b;
                a = gcd;
            }

            return gcd;
        }
    }
}
