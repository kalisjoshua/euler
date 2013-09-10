module euler001 = 

    let answer = 233168

    let result =
        [1..999]
        |> Seq.filter (fun x -> x % 3 = 0 || x % 5 = 0)
        |> Seq.sum