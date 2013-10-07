module euler034 = 
    let fac x =
        let rec fac' n t =
        match n with
        | 0 -> 1
        | 1 -> t
        | _ -> fac' (n-1) (n*t)
        fac' x 1
        
    let lookup = [0..9] |> List.map(fac)
    
    let summer (x:char[]) = x |> Array.map(fun x-> lookup.[(Int32.Parse (x.ToString()))]) |> Array.fold (+) 0
    
    let result = 
        [3..100000] 
        |> List.filter(fun x -> x = (summer ((string x).ToCharArray())))
        |> List.reduce (+)