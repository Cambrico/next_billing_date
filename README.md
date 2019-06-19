# NextBillingDate

[![Build Status](https://travis-ci.org/cambrico/next_billing_date.svg?branch=1.x-dev)](https://travis-ci.org/cambrico/next_billing_date)[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg)](LICENSE)

A small PHP 5.6+ library to calculate recurring billing dates.

## Usage with Composer

To include it in your application using Composer, you can just include in your `composer.json` file:

```json
"repositories": {
  "cambrico/next_billing_date": {
    "type": "vcs",
    "url": "https://github.com/Cambrico/next_billing_date"
  }
},
"require": {
  "cambrico/next_billing_date": "^1.0"
}
```

## Example

```php
<?php

// Import this library.
use Cambrico\NextBillingDate;

// Create a new DateTime object with the last billing date.
$last_billing_date = new DateTime('2019-01-30');

// Set the period, every 6 moths for this example, and calculate the next date.
$period = 6;
$next_billing_date = NextBillingDate::calculate($last_billing_date, $period)->format('Y-m-d');
// $next_billing_date will be '2019-07-30'.

$period = 1;
$next_billing_date = NextBillingDate::calculate($last_billing_date, $period)->format('Y-m-d');
// $next_billing_date will be '2019-02-28'.
```
