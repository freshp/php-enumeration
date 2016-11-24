[![Build Status](https://travis-ci.org/freshp/php-enumeration.svg?branch=master)](https://travis-ci.org/freshp/php-enumeration)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](LICENSE)
[![Latest Stable Version](https://poser.pugx.org/freshp/php-enumeration/v/stable)](https://packagist.org/packages/freshp/php-enumeration)
[![Total Downloads](https://poser.pugx.org/freshp/php-enumeration/downloads)](https://packagist.org/packages/freshp/php-enumeration)

# php-enumeration

small package to represent a database or api enumeration field

## Install and usage

1. Basic install via composer

    ```
    "freshp/php-enumeration"": "0.0.1"
    ```
2. take a look in the fixtures to see an example

## Checks
Run each command in the project root directory.

### Execute PHPUnit tests

```
./vendor/bin/phpunit.phar -c ./phpunit.xml --debug --verbose
```

### Execute PHPMD checks

```
./vendor/bin/phpmd-extension.phar ./src/ text phpmd.xml 
```
