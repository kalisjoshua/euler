module euler048 = 
    let exp x =
        let rec tenCheck x = 
            match x with
            | y when y > 9999999999UL -> tenCheck(x-10000000000UL)
            | _ -> x
        let rec exp' x y t=
            match y with
            | 0UL -> (tenCheck t)
            | _ -> exp' x (y-1UL) (tenCheck (x*t))
        exp' x x 1UL
    
    let result = [1UL..1000UL] |> List.map(exp) |> List.reduce(+)