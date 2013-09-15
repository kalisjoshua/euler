module euler009 = 

    let result = 
        // I had to borrow part of this solution because I was making it WAY more complicated on myself (think map/filter mayhem)
        let isTriplet (values:int*int*int) =
            match values with
            | (a,b,c) -> 
                // borrowed
                let sorted = [a;b;c] |> List.sort
                sorted.[0] * sorted.[0] + sorted.[1] * sorted.[1] = sorted.[2] * sorted.[2]
            | _ -> false

        let nums = [1..1000]

        // borrowed
        let triplets =
            let pythagorean = seq {
                                    for a in nums do
                                        for b in nums do
                                            for c in nums do
                                                if a + b + c = 1000 then yield (a,b,c)
                                }
            pythagorean 
            |> Seq.filter isTriplet 
            |> Seq.head

        match triplets with
        | (a,b,c) -> a * b * c
        | _ -> failwith "Couldn't find the solution"