module euler006 = 

    let result = 
        let nums = [1..100]

        let sumOfSquares =
            nums 
            |> List.map (fun x -> x*x)
            |> List.sum

        let squareOfSum =
            let sumOfNums = nums |> List.sum
            sumOfNums * sumOfNums
            
        squareOfSum - sumOfSquares