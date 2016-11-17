# Design-Pattern POCs from O'Reilly book "Head First Design Patterns"

All the java codes were ported to PHP7 and I have added some unit tests to play with each patterns concept.

## Install Deps Using Composer

Clone/Download the project and then run:

```
composer install
```

It will download deps and autoloader.

## Running Patterns

To run each pattern, from the src folder run:

```
php run.php -p={pattern}
```
###Avaliable Pattenrs so far

####Strategy Pattern
```
php run.php -p=strategy
```

## Unit Tests

The unit tests are not didatic about what is happening in the code and how, but they are worth looking at and running.

To run tests, if you have all requirements for [PHPUnit](https://phpunit.de/), just do on the root of the project:
```
phpunit
```

###Code Coverage
Do not forget to checkout code coverage tests report over /documentation/reports to see how exactaly the objects are interacting on the tests. 