[![Build Status](https://travis-ci.org/freshp/php-enumeration.svg?branch=master)](https://travis-ci.org/freshp/php-enumeration)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](LICENSE)
[![Latest Stable Version](https://poser.pugx.org/freshp/php-enumeration/v/stable)](https://packagist.org/packages/freshp/php-enumeration)
[![Total Downloads](https://poser.pugx.org/freshp/php-enumeration/downloads)](https://packagist.org/packages/freshp/php-enumeration)

# php-enumeration

This small package can represent a enumeration field. For example in a database or an api.

## Install and usage

1. Basic install via composer

    ```
    "freshp/php-enumeration"": "1.0.0"
    ```
2. take a look in the fixtures to see an example

## Checks
Run each command in the project root directory.

### Execute PHPUnit tests
```
./vendor/bin/phpunit.phar -c ./phpunit.xml --testdox
```

### Execute PHPCS-Fixer checks
```
./vendor/bin/phpcs-fixer.phar fix ./src 
```

### Execute PHPCS checks
```
./vendor/bin/phpcs.phar ./src --standard=PSR2 
```

### Execute PHPSTAN checks
```
./vendor/bin/phpstan.phar analyse -l max ./src
```
