
HASKELL_RUN:=haskell/run
MESSAGE="%s - Project Euler Problem %s\n\n"
NUM=$(filter-out $@, $(MAKECMDGOALS))

clean:
	@rm -f \
		haskell/*.hi \
		$(HASKELL_RUN)

hs: clean
	@printf $(MESSAGE) "Haskell" $(NUM)
	ghc -o "$(HASKELL_RUN)" "haskell/euler$(NUM).hs"
	./"$(HASKELL_RUN)"

js:
	@printf $(MESSAGE) "JavaScript" $(NUM)
	@node "js/euler$(NUM).js"

%:
	@: # phony rule to quiet warning about no rule for 'number' argument

.PHONY: clean hs js %