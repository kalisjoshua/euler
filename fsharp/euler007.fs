module euler007 = 

    open System 

    let findFactorsOf value =
        let upper = (float value) |> Math.Sqrt |> int
        [2..upper]
        |> Seq.filter (fun n -> value % n = 0)

    let isPrime value = findFactorsOf value |> Seq.length = 0

    let answer = 104743

    let result =
        Seq.unfold(fun x -> Some(x, x+1)) 2
        |> Seq.filter isPrime
        |> Seq.nth 10000