# BlackHole

[![Latest release](http://img.shields.io/github/release/CodeDruids/black-hole.svg)](https://github.com/CodeDruids/black-hole/releases)
[![Build Status](https://img.shields.io/travis/CodeDruids/black-hole/master.svg)](https://travis-ci.org/CodeDruids/black-hole)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/CodeDruids/black-hole.svg)](https://scrutinizer-ci.com/g/CodeDruids/black-hole/)
[![Code Quality](https://img.shields.io/scrutinizer/g/CodeDruids/black-hole.svg)](https://scrutinizer-ci.com/g/CodeDruids/black-hole/)
[![Software License](https://img.shields.io/badge/license-MIT-blue.svg)](LICENSE)

BlackHole is a PHP testing class that ignores anything done to it.

## Requirements

* PHP 5.6 or higher

## Installation

Add the following to your `composer.json`:

```json
{
    "require": {
        "CodeDruids/black-hole": "1.*"
    }
}
```

## Basic Usage

```php
$test = new \CodeDruids\BlackHole("test");

$test->a = "b";
unset($test->c);
isset($test->d)
$test->e("f");
\CodeDruids\BlackHole::g("h")
var_dump($test);
echo $test;
$test();
```

This can be useful when you need a placeholder object, or want the ability to switch a class alias to remove any
impact on a production environment. e.g.

```php
if (env('APP_ENV') == 'production') {
	class_alias('CodeDruids\BlackHole', 'Debug');
}
else {
	class_alias('My\Clever\Debugger', 'Debug');
}
Debug::log('Profound silence');
```


## Support

If you believe you have found a bug, please report it using the [GitHub issue tracker](https://github.com/CodeDruids/black-hole/issues),
or better yet, fork the library and submit a pull request.
