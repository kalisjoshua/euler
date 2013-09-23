module euler019 = 
    type Day= 
        | Sunday=0
        | Monday=1
        | Tuesday=2
        | Wednesday=3
        | Thursday=4
        | Friday=5
        | Saturday=6
    
    type Year=
        | Regular of int * Day
        | Leap of int * Day
    
    let isLeapYear = function | 0 -> true | _ -> false
    let isLeap y= ((isLeapYear (y%4)) && ((not (isLeapYear (y%100))) || (isLeapYear (y%400))))

    let nextYear y= 
        match y with
        | Regular(y,d) -> 
            match isLeap (y+1) with
            | true -> Leap(y+1,enum<Day>(((int d)+365)%7))
            | false -> Regular(y+1,enum<Day>(((int d)+365)%7))
        | Leap(y,d) -> Regular(y+1,enum<Day>(((int d)+366)%7))
    
    let sunCount day leap=
        match leap with
        | true -> [0; 30; 58; 89; 119; 150; 180; 211; 242; 272; 305; 333]
        | false -> [0; 30; 59; 90; 120; 151; 181; 212; 243; 273; 304; 334] 
        |> List.filter (fun x-> (((int day)+x) % 7 = 0)) |> List.length

    let rec sundays current stop ct =    
        match current with
        | Regular(y,d) ->
            match y with
            | x when x = stop -> ct
            | _ -> sundays (nextYear current) stop (ct + (sunCount d false))
        | Leap(y,d) ->
            match y with
            | x when x = stop -> ct
            | _ -> sundays (nextYear current) stop (ct + (sunCount d true))
        
    let result = sundays (nextYear (Regular (1900, Day.Monday))) 2000 0