module euler004 = 

    let answer = 906609

    let result = 
        let isPalindrome x =
            let x' = (string x).ToCharArray()
            let reverse = x' |> Array.rev
            x' = reverse

        { 100..999 }
            |> Seq.collect (fun n -> { 100..999 } |> Seq.map (fun n' -> n * n'))
            |> Seq.filter (isPalindrome) 
            |> Seq.max