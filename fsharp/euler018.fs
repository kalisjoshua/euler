module euler018 = 
    let tri = [
        [75]
        [95; 64]
        [17; 47; 82]
        [18; 35; 87; 10]
        [20; 04; 82; 47; 65]
        [19; 01; 23; 75; 03; 34]
        [88; 02; 77; 73; 07; 63; 67]
        [99; 65; 04; 28; 06; 16; 70; 92]
        [41; 41; 26; 56; 83; 40; 80; 70; 33]
        [41; 48; 72; 33; 47; 32; 37; 16; 94; 29]
        [53; 71; 44; 65; 25; 43; 91; 52; 97; 51; 14]
        [70; 11; 33; 28; 77; 73; 17; 78; 39; 68; 17; 57]
        [91; 71; 52; 38; 17; 14; 91; 43; 58; 50; 27; 29; 48]
        [63; 66; 04; 68; 89; 53; 67; 30; 73; 16; 69; 87; 40; 31]
        [04; 62; 98; 27; 23; 09; 70; 98; 73; 93; 38; 53; 60; 04; 23]
    ]

    type Tree<'T> = 
        | Node of 'T * Tree<'T> * Tree<'T>
        | Leaf of 'T

    let Left = function | Node(x, l, r) -> l | _ -> failwith "cant do it"
    let Right = function | Node(x, l, r) -> r | _ -> failwith "cant do it"
    let Value = function | Node(x, l, r) -> x | Leaf(x) -> x

    let rec parseTree (tree:list<list<int>>) depth outTree=
        match depth with
        | 0 -> parseTree tree (depth+1) (tree.[tree.Length-1] |> List.map (fun x-> Leaf x))
        | x when x < (tree.Length) -> parseTree tree (depth+1) (tree.[tree.Length-depth-1] |> List.mapi (fun i x -> Node (x, outTree.[i],outTree.[i+1])))
        | _ -> outTree |> List.head

    let rec goDeep tree= 
        match tree with 
        | Node(x,l,r) -> [(x + (goDeep l)); (x + (goDeep r))] |> List.max
        | Leaf(x) -> x

    let pickDirection tree=
        match tree with
        | Node(x,l,r) -> if (Value l) > (Value r) then l else r
        | Leaf(x) -> failwith "cant do it"

    let pTree = parseTree tri 0 []
    let rec traverse tree total=
        match tree with
        | Node(x,l,r) -> printfn "%A " x; traverse  (tree |> pickDirection) (total + x)
        | Leaf(x) -> printfn "%A " x;(total+x)
    let result = traverse pTree 0