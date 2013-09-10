module euler014 =
    let answer = 1

    let (|Even|Odd|) = function
        x when x % 2 = 0 -> Even (x/2)
        | x -> Odd (3 * x + 1)

    let collatz (n:int):int =
        let value = function Even x -> x | Odd x -> x

        let rec collatz_rec n acc =
            let value' = n |> value
            if value' = 1 then 1::acc
            else collatz_rec value' (value'::acc)
        collatz_rec n [n] |> List.length

    let result =
        let initial =
            Seq.unfold (fun(acc,state) -> Some(acc, (state + acc, state + 1))) (0,1)
            |> Seq.skip 1
        
        initial
        |> Seq.max collatz
        
        //collatz 13