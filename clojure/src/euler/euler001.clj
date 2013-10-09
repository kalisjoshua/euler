(ns euler.euler001
  (:require [euler.helper :refer [run-solution]]))

(defn solution
  []
  (reduce +
          (for [x (range 0 1000)
                :when (or
                       (= (rem x 3) 0)
                       (= (rem x 5) 0))]
            x)))

(defn -main
  [& args]
  (run-solution solution 233168))