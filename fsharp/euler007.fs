module euler007

open System 

let findFactorsOf value =
    let upper = (float value) |> Math.Sqrt |> uint64
    [2UL..upper]
    |> Seq.filter (fun n -> value % n = 0UL)

let isPrime value = findFactorsOf value |> Seq.length = 0

let answer = 104743

let result =
    Seq.unfold(fun x -> Some(x, x+1)) 2
    |> Seq.filter (fun x -> isPrime (uint64 x))
    |> Seq.nth 10000