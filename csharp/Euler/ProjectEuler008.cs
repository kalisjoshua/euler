﻿using System;
using System.Collections.Concurrent;
using System.Collections.Generic;
using System.Diagnostics;
using System.Linq;
using System.Threading.Tasks;

namespace ProjectEulerMain
{
    class ProjectEuler008
    {
        /// <summary>
        /// This program finds the largest product of 5 numbers in the given sequence.
        /// </summary>
        /// <param name="args"></param>
        public static void Euler8(string[] args)
        {
            Stopwatch stopwatch = Stopwatch.StartNew();

            Console.WriteLine("The largest product of 5 consecutive digits from the given number is {0}", 
                LargestProduct());
            
            stopwatch.Stop();
            Console.WriteLine("The total time was {0} miliseconds", 
                stopwatch.ElapsedMilliseconds);
        }

        private static int LargestProduct()
        {
            // This is a very large number...
            string thousandDigit =
                "73167176531330624919225119674426574742355349194934" +
                "96983520312774506326239578318016984801869478851843" +
                "85861560789112949495459501737958331952853208805511" +
                "12540698747158523863050715693290963295227443043557" +
                "66896648950445244523161731856403098711121722383113" +
                "62229893423380308135336276614282806444486645238749" +
                "30358907296290491560440772390713810515859307960866" +
                "70172427121883998797908792274921901699720888093776" +
                "65727333001053367881220235421809751254540594752243" +
                "52584907711670556013604839586446706324415722155397" +
                "53697817977846174064955149290862569321978468622482" +
                "83972241375657056057490261407972968652414535100474" +
                "82166370484403199890008895243450658541227588666881" +
                "16427171479924442928230863465674813919123162824586" +
                "17866458359124566529476545682848912883142607690042" +
                "24219022671055626321111109370544217506941658960408" +
                "07198403850962455444362981230987879927244284909188" +
                "84580156166097919133875499200524063689912560717606" +
                "05886116467109405077541002256983155200055935729725" +
                "71636269561882670428252483600823257530420752963450";

            var thousandArray = thousandDigit.ToCharArray();

            var productsList = new BlockingCollection<int>();

            Parallel.For(0, thousandArray.Length - 4, i =>
            {
                int product = CharToInt(thousandArray[i])
                    * CharToInt(thousandArray[i + 1])
                    * CharToInt(thousandArray[i + 2])
                    * CharToInt(thousandArray[i + 3])
                    * CharToInt(thousandArray[i + 4]);

                productsList.Add(product);
            });

            return productsList.Max();
        }

        private static int CharToInt(char c)
        {
            // Subtracts the ASCII char value c from '0' which is the integer 48
            // Integers 1 - 9 are characters 49 - 57
            return (int)(c - '0');
        }
    }
}
