
HASKELL_RUN:=haskell/run
NUM=$(filter-out $@,$(MAKECMDGOALS))
TEXT="- Project Euler Problem"

clean:
	@rm haskell/*.hi
	@rm haskell/run

hs:
	@printf "%s %s $(NUM)\n\n" "Haskell" $(TEXT)
	ghc -o "$(HASKELL_RUN)" "haskell/euler$(NUM).hs"
	./"$(HASKELL_RUN)"

js:
	@printf "%s %s $(NUM)\n\n" "JavaScript" $(TEXT)
	@node "js/euler$(NUM).js"

%:
	@: # phony rule to quiet warning about no rule for 'number' argument

.PHONY: hs js