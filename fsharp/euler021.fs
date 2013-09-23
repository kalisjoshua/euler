module euler021 = 
    let divisors x =
        match x with
        | 0 | 1 -> 0
        | _ -> [1..(x/2)] |> List.filter (fun d-> x%d=0) |> List.reduce (+)

    let divisorList = [0..10000] |> List.map(fun x-> (x, (divisors x)))

    let result = 
        divisorList 
        |> List.filter(fun x-> (snd x) < 10001) 
        |> List.filter (fun x-> (snd divisorList.[(snd x)]) = (fst x)) 
        |> List.filter (fun x-> (fst x) <> (snd x))
        |> List.map (fst)
        |> List.reduce (+)