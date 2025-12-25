<?php

/*
|--------------------------------------------------------------------------
| Pest Configuration for SilverStripe Framework
|--------------------------------------------------------------------------
|
| This file configures Pest to work with SilverStripe's testing infrastructure.
| Pest can be used alongside PHPUnit for new tests, or to gradually migrate
| existing PHPUnit tests to Pest syntax.
|
*/

// Use SilverStripe's base test classes
use SilverStripe\Dev\SapphireTest;
use SilverStripe\Dev\FunctionalTest;
use PHPUnit\Framework\TestCase;

/*
|--------------------------------------------------------------------------
| Test Case Bindings
|--------------------------------------------------------------------------
|
| Bind Pest test functions to SilverStripe test case classes.
| You can use different test classes for different test directories.
|
*/

// Default: Use PHPUnit TestCase for simple unit tests
uses(TestCase::class)->in('Unit');

// Use SapphireTest for SilverStripe-specific tests
uses(SapphireTest::class)->in('SilverStripe');

// Use FunctionalTest for integration/functional tests
uses(FunctionalTest::class)->in('Functional');

/*
|--------------------------------------------------------------------------
| Custom Expectations
|--------------------------------------------------------------------------
|
| Extend Pest's expectation API with custom assertions specific to
| SilverStripe if needed.
|
*/

// Example: Custom expectation for SilverStripe DataObjects
// expect()->extend('toBeInstanceOfDataObject', function ($class) {
//     return $this->toBeInstanceOf($class)
//         ->and($this->value)->toBeInstanceOf(\SilverStripe\ORM\DataObject::class);
// });
