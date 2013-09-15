module euler014 =
    
    open System.Collections.Generic

    let (|Even|Odd|) = function
        x when x % 2L = 0L -> Even (x/2L)
        | x -> Odd (3L * x + 1L)

    let sequence_cache = new Dictionary<int64, int64 list>()

    let calculate_sequence n =
        let rec collatz_sequence n (partial:int64 list) (cache: IDictionary<_, _ list>) =
            match cache.TryGetValue n with
            | true, r ->
                let result = partial @ r
                let sequence_starter = List.head result
                if not(cache.ContainsKey(sequence_starter)) then
                    cache.Add(sequence_starter, result) |> ignore
                result
            | _ ->  match n with
                    | 1L ->
                        let result = partial @ [1L]
                        let sequence_starter = List.head result
                        cache.Add(sequence_starter, result) |> ignore
                        result
                    | Odd x -> collatz_sequence x (partial @ [n]) cache
                    | Even x -> collatz_sequence x (partial @ [n]) cache

        collatz_sequence n [] sequence_cache
     
    let max_sequence_lengths (max:int64) =
        [1L..max] 
        |> List.map (fun x -> (x,calculate_sequence x |> List.length)) 
        |> List.maxBy (fun (_,x) -> x)
        |> fst

    let result = 1000000L |> max_sequence_lengths