-module(euler002).
-export([result/0]).

fib(0) -> 1;
fib(1) -> 1;
fib(X) -> fib(X-1) + fib(X-2).

result() -> lists:foldl(fun (X, Sum) -> X + Sum end, 0, [X || X <- lists:map(fun (X) -> fib(X) end, lists:seq(0,40)), (X rem 2 == 0) and (X < 4000000)]).