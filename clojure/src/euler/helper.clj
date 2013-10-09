(ns euler.helper)

(defn run-solution
  [solution-fn expected-output]
  (let [start-time (.getTime (java.util.Date.))
        output (solution-fn)
        elapsed-time (- (.getTime (java.util.Date.)) start-time)]
    (if (= output expected-output)
      (println (str "Success!" "\n" "Total time, " elapsed-time " milliseconds."))
      (println (str "Try again." "\n" output)))))