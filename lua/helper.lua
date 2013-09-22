
local ANSWER = arg[1]
local start

function helper (attempt)
  local time = (os.clock() - start) * 1000

  if tonumber(ANSWER) == tonumber(attempt) then
    print('Success!')
    print(string.format('Total time, %f miliseconds.', time))
  else
    print('Keep trying.')
    print(attempt)
  end
end

start = os.clock()

return helper
