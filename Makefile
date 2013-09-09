
HASKELL_RUN:=haskell/run
MESSAGE="%s - Project Euler Problem %s\n\n"
NUM=$(filter-out $@, $(MAKECMDGOALS))

bash:
	@printf $(MESSAGE) "Bash" $(NUM)
	@bash -f "bash/euler$(NUM).sh"

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

php:
	@printf $(MESSAGE) "PHP" $(NUM)
	@php -f "php/euler$(NUM).php"

%:
	@: # phony rule to quiet warning about no rule for 'number' argument

.PHONY: bash clean hs js php %
