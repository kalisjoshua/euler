module euler015 =
    let partialfactorial l u = [l..u] |> List.reduce(*)
    let factorial (n:bigint) = partialfactorial 1I n
    let combinator n k = (partialfactorial (k+1I) n) / (factorial k)
    
    let result = combinator 40I 20I