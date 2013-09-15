module euler016 = 
    // bitshifting broke this, but somehow bigint was ok with it...
    let result = 
        (bigint(2)**1000).ToString() 
        |> Seq.map (fun x-> x |> string |> Int16.Parse)
        |> Seq.reduce(+)