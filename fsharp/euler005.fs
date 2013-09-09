module euler005

let answer = 232792560

let result = 
    let divisors = [ 1..20 ]

    let divideBy value = 
        divisors
        |> Seq.forall (fun x -> value % x = 0)
    let max = List.max(divisors)

    Seq.unfold (fun n -> Some(n, n+1)) 1
    |> Seq.map (fun n -> n * max)
    |> Seq.filter (fun n -> divideBy n)
    |> Seq.head

    // Solution from http://theburningmonk.com/2010/09/project-euler-problem-5-solution/ 
    (*  
        let isEvenlyDivided(n, m) = n % m = 0
        let isEvenlyDividedByAll(n, numbers) = numbers |> Seq.forall (fun x -> isEvenlyDivided(n, x))
 
        let findSmallestCommonMultiple(numbers) =
            let max = Array.max(numbers)
            Seq.unfold (fun x -> Some(x, x + 1)) 1
            |> PSeq.map (fun x -> x * max)
            |> PSeq.filter (fun x -> isEvenlyDividedByAll(x, numbers))
            |> PSeq.head
 
        findSmallestCommonMultiple [|1..20|] 
    *)