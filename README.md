[![Build Status](https://travis-ci.org/freshp/php-enumeration.svg?branch=master)](https://travis-ci.org/freshp/php-enumeration)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](LICENSE)
[![Latest Stable Version](https://poser.pugx.org/freshp/php-enumeration/v/stable)](https://packagist.org/packages/freshp/php-enumeration)
[![Total Downloads](https://poser.pugx.org/freshp/php-enumeration/downloads)](https://packagist.org/packages/freshp/php-enumeration)

# php-enumeration

This small package can represent a enumeration field. For example in a database or an api.

Featureslist: 
* inspired and mostly used for MySQL enum-fields or API enum-fields
* it is a simple string representation
* no other values are allow besides the defined in the class
* simple usage and easy to read
* no features a enum do not have to deal with
* with a default fallback value which will be used if no matching value exists in const´s
   * you can harden this object by throwing an exception in the `getDefault`-method 

## Install

Basic install via composer
    ```
    "freshp/php-enumeration"": "3.1.0"
    ```

##  Usage

Take a look in `tests/fixtures` to see a executable example.

Create a new object with:
1. public const´s which represent strings
2. implement the `getDefault`-method
 
### Create an enumeration object
```php
use FreshP\PhpEnumeration\Enum;

class EnumExample extends Enum
{
    public const TEST_CONSTANT = 'constant';
    public const TEST_DEFAULT = 'default';
    
    protected function getDefault(): string
    {
        return self::TEST_DEFAULT;
    }
}
```

use annotations for better ide support

```php
use FreshP\PhpEnumeration\Enum;

/**
 * @method static self TEST_CONSTANT()
 * @method static self TEST_DEFAULT()
 */
class EnumExample extends Enum
...
```

make the data of the parent `toArray`-method public if you need to iterate over all options

```php
class EnumExample extends Enum
{
...
    public function listAllOptions(): array
    {
        return $this->toArray();
    }
...
```

### Use the enumeration object
1. create the object by static call
    ```php
    $enum = EnumExample::TEST_CONSTANT();
    ```

1. create the object by normal initialization
    ```php
    $enum = new EnumExample(EnumExample::TEST_CONSTANT);
    ```
   
1. create a default object (the value from the `getDefault`-method will be called)
    ```php
    $enum = new EnumExample();
    ```
   
1. compare the object by using the `__toString`-method
    ```php
   $enum === EnumExample::TEST_CONSTANT
    ```

## Checks
Run each command in the project root directory.

### Execute PHPUnit tests
```
./vendor/bin/phpunit.phar --testdox
```

### Execute fix PHPCS problems
```
./vendor/bin/phpcbf.phar
```

### Execute PHPCS checks
```
./vendor/bin/phpcs.phar
```

### Execute PHPSTAN checks
```
./vendor/bin/phpstan.phar analyse -l max ./src
```
