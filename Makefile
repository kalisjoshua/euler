
ANS_001=233168
ANS_002=4613732
ANS_003=6857
ANS_004=906609
ANS_005=232792560
ANS_006=25164150
ANS_007=104743
ANS_008=40824
ANS_009=31875000
ANS_010=142913828922
ANS_011=70600674
ANS_012=76576500
ANS_013=5350353422
ANS_014=837799
ANS_015=137846528820

ANS_021=31626

HASKELL_RUN:=haskell/run
MESSAGE="%s - Project Euler Problem %s\n\n"
NUM=$(filter-out $@, $(MAKECMDGOALS))

answer:
	@echo $(ANS_$(NUM))

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
	@node "js/euler$(NUM).js" $(ANS_$(NUM))

lua:
	@printf $(MESSAGE) "Lua" $(NUM)
	@lua "lua/euler$(NUM).lua" $(ANS_$(NUM))

php:
	@printf $(MESSAGE) "PHP" $(NUM)
	@php -f "php/euler$(NUM).php"

py:
	@printf $(MESSAGE) "Python" $(NUM)
	@python "python/euler$(NUM).py"

%:
	@: # phony rule to quiet warning about no rule for 'number' argument

.PHONY: answer bash clean hs js lua php py %
