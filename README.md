[![Build Status](https://travis-ci.org/Fleshgrinder/php-value-object.svg)](https://travis-ci.org/Fleshgrinder/php-value-object)
[![Code Climate](https://codeclimate.com/github/Fleshgrinder/php-value-object/badges/gpa.svg)](https://codeclimate.com/github/Fleshgrinder/php-value-object)
[![Test Coverage](https://codeclimate.com/github/Fleshgrinder/php-value-object/badges/coverage.svg)](https://codeclimate.com/github/Fleshgrinder/php-value-object/coverage)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/512975d9-5cd0-4f65-9334-31bbe732d6de/mini.png)](https://insight.sensiolabs.com/projects/512975d9-5cd0-4f65-9334-31bbe732d6de)
# Value Object
Abstract **value object** package that contains the building blocks to create custom domain value objects.

## Install
Open a terminal, enter your project directory and execute the following command to add this package to your
 dependencies:

```bash
$ composer require fleshgrinder/value-object
```

This command requires you to have Composer installed globally, as explained in the
 [installation chapter](https://getcomposer.org/doc/00-intro.md) of the Composer documentation.

## Usage
There are two abstract classes and one interface in the source directory that can be used to build custom domain value
 objects tailored to the needs of a project. The provided `ValueObject` interface is a head interface that combines some
 interfaces to adhere to a contract of common methods that every value object should provide. Implementation of this
 interface is recommended for totally custom behavior.

The `SingleValueObject` is the perfect base for building value objects that are representable by a single value. Simply
 extend the abstract class and implement the necessary abstract methods and it should work out of the box. You may also
 extend the `SingleValueObjectTest` and override the `getInstance`, `getDefaultValue`, and `getDefaultUnequalValue`
 methods for a thorough test of your custom single valued value object.

The `MultiValueObject` is the perfect base for building value objects that represent multiple values. However, it only
 implements the `equals` method that ensures that the given value is of the same instance and delegates further checks
 to the extending child class. Multi valued value objects are complex and it is not possible to implement an abstraction
 that fits all requirements. You may also simply implement the interface and implement the instance of check yourself if
 you want.

## Weblinks
- Wikipedia: [Value Object](https://en.wikipedia.org/wiki/Value_object)
- Mathias Verraes: [Casting Value Objects](http://verraes.net/2013/02/casting-value-objects/)
- Eric Evans (2003): [Domain-Driven Design: Tackling Complexity in the Heart of Software](http://www.domaindrivendesign.org/books/evans_2003)
- Wikipedia: [Domain-Driven Design](https://en.wikipedia.org/wiki/Domain-driven_design)
- Carlos Buenosvinos, Christian Soronellas and Keyvan Akbary: [Domain-Driven Design in PHP](https://leanpub.com/ddd-in-php)

## License
[![MIT License](https://upload.wikimedia.org/wikipedia/commons/thumb/c/c3/License_icon-mit.svg/48px-License_icon-mit.svg.png)](https://opensource.org/licenses/MIT)
