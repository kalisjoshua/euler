module euler010 = 

    open System

    let findFactorsOf value =
        let upper = (float value) |> Math.Sqrt |> uint64
        [2UL..upper]
        |> Seq.filter (fun n -> value % n = 0UL)

    let isPrime value = findFactorsOf value |> Seq.length = 0

    let result = 
        // This solution takes ~4mins to execute
        let genSeq = seq { for i in 2UL..2000000UL do if (isPrime i) then yield i }
        genSeq |> Seq.sum

        // This was my first solution and I gave up on it because it was taking too long.
        // When I let it run it took 4mins 15sec to execute and I was just being impatient.
        //{1UL..2000000UL} 
        //|> PSeq.filter isPrime
        //|> PSeq.sum