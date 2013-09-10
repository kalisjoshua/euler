module euler012 =

    open System
    
    let all_factors n =
        let rec all_factors_rec n i fac =
            if n % i = 0 then
                let y = n / i
                if(i < y) then
                    all_factors_rec n (i + 1) (i::y::fac)
                elif (i = y) then
                    i::fac
                else
                    fac
            elif i > int (sqrt (float n)) then
                fac
            else
                all_factors_rec n (i + 1) fac
        all_factors_rec n 1 []
    
    let triangles =
        Seq.unfold (fun(acc,state) -> Some(acc, (state + acc, state + 1))) (0,1)
        |> Seq.skip 1
    
    let findIndex m =
        triangles 
        |> Seq.map all_factors 
        |> Seq.tryFindIndex (fun x -> List.length x >= m)
        
    let getResult = function Some x ->  triangles |> Seq.skip x |> Seq.head | None -> failwith "Oooops"
    
    let answer = 76576500
    
    let result = findIndex 500 |> getResult 