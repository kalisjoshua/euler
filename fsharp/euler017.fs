module euler017 = 
    let wc w =
        match w with
        | "one" | "two" | "six" | "ten" | "and" -> 3
        | "four" | "five" | "nine" -> 4
        | "three" | "seven" | "eight" | "forty" | "fifty" | "sixty" -> 5
        | "eleven" | "twelve" | "twenty" | "thirty" | "eighty" | "ninety" -> 6
        | "fifteen" | "sixteen" | "seventy" | "hundred" -> 7
        | "thirteen" | "fourteen" | "eighteen" | "nineteen" | "thousand" -> 8 
        | "seventeen" -> 9  
        | _ -> failwith "check spelling yo"

    let ot9 = ["one"; "two"; "three"; "four"; "five"; "six"; "seven"; "eight"; "nine"]
    let sumit lst = lst |> List.map (fun x-> wc(x)) |> List.reduce (+)
    let tener b = (wc(b) *10) + sumit(ot9)
    let hundreder b = sumit [b; "hundred"; "and"]
    let subten = sumit ot9
    let teens = sumit ["ten"; "eleven"; "twelve"; "thirteen"; "fourteen"; "fifteen"; "sixteen"; "seventeen"; "eighteen"; "nineteen"]
    let tens = ["twenty"; "thirty"; "forty"; "fifty"; "sixty"; "seventy"; "eighty"; "ninety"] |> List.map(tener) |> List.reduce (+)
    let hundreds = (ot9 |> List.map(fun x-> hundreder x) |> List.map(fun x-> (x*100 - wc("and")) + subten + teens + tens)) |> List.reduce(+)
    let result = subten + teens + tens + hundreds + sumit["one"; "thousand"]