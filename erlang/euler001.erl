-module(euler001).
-export([result/0]).

result() -> lists:foldl(fun (X, Sum) -> X + Sum end, 0, [X || X <- lists:seq(1,999), (X rem 3 == 0) or (X rem 5 == 0)]).