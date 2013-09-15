module euler012 =

    open System
    
    let all_factors n =
        let rec all_factors_rec n i fac =
            match n with
            | x when x % i = 0 -> 
                match x / i with
                | y when y > i -> all_factors_rec n (i + 1) (i::y::fac)
                | y when y = i -> i::fac
                | _ -> fac
            | x when int (sqrt (float x)) < i -> fac
            | _ -> all_factors_rec n (i + 1) fac
        all_factors_rec n 1 []
    
    let triangles =
        Seq.unfold (fun(acc,state) -> Some(acc, (state + acc, state + 1))) (0,1)
        |> Seq.skip 1
    
    let findIndex m =
        triangles 
        |> Seq.map all_factors 
        |> Seq.tryFindIndex (fun x -> List.length x >= m)
        
    let getResult = function 
            Some x -> triangles |> Seq.skip x |> Seq.head 
            | None -> failwith "Oooops"
    
    let result = findIndex 500 |> getResult 