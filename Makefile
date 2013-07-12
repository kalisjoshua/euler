
HASKELL_RUN:=haskell/run
NUM=$(filter-out $@,$(MAKECMDGOALS))

clean:
	rm haskell/*.hi
	rm haskell/run

hs: clean
	@echo "Executing Project Euler #$(NUM) Solution\n"
	ghc -o "$(HASKELL_RUN)" "haskell/euler$(NUM).hs"
	./"$(HASKELL_RUN)"

js:
	@echo "Executing Project Euler #$(NUM) Solution\n"
	@node "js/euler$(NUM).js"

%:
	@: # phony rule to quiet warning about no rule for 'number' argument

.PHONY: hs js