module euler002

let answer = 4613732

let result =
    Seq.unfold (fun (c,n) -> Some(c, (n, c + n))) (0,1)
    |> Seq.takeWhile(fun x -> x <= 4000000)
    |> Seq.filter (fun x -> x % 2 = 0)
    |> Seq.sum