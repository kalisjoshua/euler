
local start

function helper (ANSWER, attempt)
  if ANSWER == attempt then
    print('Success!')
    print(string.format('Total time, %f miliseconds.', (os.clock() - start) * 1000))
  else
    print('Keep trying.')
    print(attempt)
  end
end

start = os.clock()

return helper
