# Combinationlock Generator

Generates Combinations for a combinationLock following specific rules

* does not contain a '4'
* does contain once ore more '5'
* does contain once ore more '6'
* does not start with an even number or '0'

one more rule is missing:

* the numbers are almost increasing with max. one exception

## how to run the code

### Install the vendor packages
```
$ composer install
```

### Get the command description
```
$ php combinationsLock.php -h
  Usage:
    combinationsLock.php <digits>
  
  Arguments:
    digits                The number of digits.
```

### Run the command
```
$  php combinationsLock.php 3 
  Generating Combinations with 3 digits.
  156
  165
  356
  365
  506
  516
  526
  536
  556
  560
  561
  562
  563
  565
  566
  567
  568
  569
  576
  586
  596
  756
  765
  956
  965
```
 
## Run tests

```
$  ./bin/phpunit               
  PHPUnit 7.5.20 by Sebastian Bergmann and contributors.
  
  Testing Project Test Suite
  .....................                                             21 / 21 (100%)
  
  Time: 92 ms, Memory: 6.00 MB
```

## Known issues

This service needs a lot of memory running with digits > 5
This can be improved applying the rules while generating the combinations.


