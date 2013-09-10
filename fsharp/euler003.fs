module euler003 = 

    let rec findFactorsRecursive (value:int64) nextFact factors =
        if(value > 2L) then
            match value % nextFact with
            | 0L -> 
                let value' = value / nextFact
                let nextFact' = nextFact + 1L
                let factors' = nextFact :: factors
                findFactorsRecursive value' nextFact' factors'
            | _ -> 
                let nextFact' = nextFact + 1L
                findFactorsRecursive value nextFact' factors
        else
            factors

    let answer = 6857

    let result = (findFactorsRecursive 600851475143L 2L []) |> List.max