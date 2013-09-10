# Project Euler Group Learning

A collection of solutions to Project Euler problems in different languages to be used for learning new language dynamics and approaches to solving problems. Each language will have its own benefits and deficits therefore the solutions will be slightly different based on the language used as long as the spirit of the language is embraced and exploited.

Happy coding!

# Contributing

All solutions should be executable on the command line for consistency.

## Makefile

Each language should be easily run via the Makefile `make <language> ###`. As an example:

    $ make js 001

If you are adding a new language to the project please make sure that you also include a Makefile target to execute the new language's solution files.

## Reporting

Each language should comply with the standard output and performance reporting by providing a 'helper' file that will handle starting the timer, stopping the timer and outputing the results.

### Success Reporting

    Success!
    Total time, ## milisecond.

### Failure Reporting

    Try again.
    <result>

If you are adding a new language to the project please make sure that you check with an existing language for an example of how this should be formatted.

# TODO

  * Performance profiling - compare performance between and within languages
  * Standardize output of all languages
  * Unit test the output of all solutions for each language
  * Keep "TODO" up-to-date
  * Learn stuff.

# Contributors

  * [Joe Colburn](https://github.com/joetech)
  * [John Fair](https://github.com/johnbfair)
  * [Karl Herrick](https://github.com/kherrick)
  * [Joshua Kalis](https://github.com/kalisjoshua)
