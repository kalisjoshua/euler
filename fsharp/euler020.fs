module euler020 = 
    let rec fac n t=
        match n with
        | x when x = 1I -> t
        | _ -> fac (n-1I) (n*t)

    let result  = 
        (fac 100I 1I).ToString()
        |> Seq.map (fun x-> x |> string |> int)
        |> Seq.reduce (+)