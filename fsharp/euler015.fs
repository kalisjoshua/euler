module euler015 =
    open System.Numerics
    let partialfactorial l u = [l..u] |> List.reduce(*)
    let factorial (n:bigint) = partialfactorial (bigint 1) n
    let combinator n k = (partialfactorial (k+(bigint 1)) n) / (factorial k)
    let result = combinator (bigint 40) (bigint 20)
