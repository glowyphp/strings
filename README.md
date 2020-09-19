<h1 align="center">Strings Component</h1>

<p align="center">
<a href="https://github.com/atomastic/strings/releases"><img alt="Version" src="https://img.shields.io/github/release/atomastic/strings.svg?label=version&color=green"></a> <a href="https://github.com/atomastic/strings"><img src="https://img.shields.io/badge/license-MIT-blue.svg?color=green" alt="License"></a> <a href="https://github.com/atomastic/strings"><img src="https://img.shields.io/github/downloads/atomastic/strings/total.svg?color=green" alt="Total downloads"></a> <img src="https://github.com/atomastic/strings/workflows/Static%20Analysis/badge.svg?branch=dev"> <img src="https://github.com/atomastic/strings/workflows/Tests/badge.svg"> 
  <a href="https://app.codacy.com/gh/atomastic/strings?utm_source=github.com&utm_medium=referral&utm_content=atomastic/strings&utm_campaign=Badge_Grade_Dashboard"><img src="https://api.codacy.com/project/badge/Grade/72b4dc84c20145e1b77dc0004a3c8e3d"></a>
</p>
<br>

### Installation

#### With [Composer](https://getcomposer.org)

```
composer require atomastic/strings
```

### Usage

```php
use Atomastic\Strings\Strings;
```

### Methods

| Method | Description |
|---|---|
| <a href="#strings_of">`of()`</a> | Initializes a Strings object and assigns both $string and $encoding properties the supplied values. $string is cast to a string prior to assignment. Throws an InvalidArgumentException if the first argument is an array or object without a `__toString` method. |
| <a href="#strings_stripSpaces">`stripSpaces()`</a> | Strip all whitespaces from the given string. |
| <a href="#strings_trimSlashes">`trimSlashes()`</a> | Removes any leading and trailing slashes from a string. |
| <a href="#strings_reduceSlashes">`reduceSlashes()`</a> | Reduces multiple slashes in a string to single slashes. |
| <a href="#strings_stripQuotes">`stripQuotes()`</a> | Removes single and double quotes from a string. |
| <a href="#strings_quotesToEntities">`quotesToEntities()`</a> | Convert single and double quotes to entities. |
| <a href="#strings_normalizeNewLines">`normalizeNewLines()`</a> | Standardize line endings to unix-like. |
| <a href="#strings_normalizeSpaces">`normalizeSpaces()`</a> | Normalize white-spaces to a single space. |
| <a href="#strings_random">`random()`</a> | Creates a random string of characters. |
| <a href="#strings_increment">`increment()`</a> | Add's `_1` to a string or increment the ending number to allow `_2`, `_3`, etc. |
| <a href="#strings_wordsCount">`wordsCount()`</a> | Return information about words used in a string. |
| <a href="#strings_length">`length()`</a> | Return the length of the given string. |
| <a href="#strings_lower">`lower()`</a> | Convert the given string to lower-case. |
| <a href="#strings_upper">`upper()`</a> | Convert the given string to upper-case. |
| <a href="#strings_limit">`limit()`</a> | Limit the number of characters in a string. |
| <a href="#strings_studly">`studly()`</a> | Convert a value to studly caps case. |
| <a href="#strings_snake">`snake()`</a> | Convert a string to snake case. |
| <a href="#strings_camel">`camel()`</a> | Convert a string to camel case. |
| <a href="#strings_kebab">`kebab()`</a> | Convert a string to kebab case. |
| <a href="#strings_words">`words()`</a> | Limit the number of words in a string. |
| <a href="#strings_contains">`contains()`</a> | Determine if a given string contains a given substring. |
| <a href="#strings_containsAll">`containsAll()`</a> | Determine if a given string contains all array values. |
| <a href="#strings_containsAny">`containsAny()`</a> | Determine if a given string contains any of array values. |
| <a href="#strings_substr">`substr()`</a> | Returns the portion of string specified by the start and length parameters. |
| <a href="#strings_ucfirst">`ucfirst()`</a> | Converts the first character of a UTF-8 string to upper case and leaves the other characters unchanged. |
| <a href="#strings_trim">`trim()`</a> | Strip whitespace (or other characters) from the beginning and end of a string. |
| <a href="#strings_trimRight">`trimRight()`</a> | Strip whitespace (or other characters) from the end of a string. |
| <a href="#strings_trimLeft">`trimLeft()`</a> | Strip whitespace (or other characters) from the beginning of a string. |
| <a href="#strings_capitalize">`capitalize()`</a> | Converts the first character of every word of string to upper case and the others to lower case. |
| <a href="#strings_reverse">`reverse()`</a> | Reverses string. |
| <a href="#strings_segments">`segments()`</a> | Get array of segments from a string based on a delimiter. |
| <a href="#strings_segment">`segment()`</a> | Get a segment from a string based on a delimiter. Returns an empty string when the offset doesn't exist. Use a negative index to start counting from the last element. |
| <a href="#strings_firstSegment">`firstSegment()`</a> | Get the first segment from a string based on a delimiter. |
| <a href="#strings_lastSegment">`lastSegment()`</a> | Get the last segment from a string based on a delimiter. |
| <a href="#strings_between">`between()`</a> | Get the portion of a string between two given values. |
| <a href="#strings_before">`before()`</a> | Get the portion of a string before the first occurrence of a given value. |
| <a href="#strings_beforeLast">`beforeLast()`</a> | Get the portion of a string before the last occurrence of a given value. |
| <a href="#strings_after">`after()`</a> | Return the remainder of a string after the first occurrence of a given value. |
| <a href="#strings_afterLast">`afterLast()`</a> | Return the remainder of a string after the last occurrence of a given value. |
| <a href="#strings_padBoth">`padBoth()`</a> | Pad both sides of a string with another. |
| <a href="#strings_padLeft">`padLeft()`</a> | Pad the left side of a string with another. |
| <a href="#strings_padRight">`padRight()`</a> | Pad the right side of a string with another. |
| <a href="#strings_replaceArray">`replaceArray()`</a> | Replace a given value in the string sequentially with an array. |
| <a href="#strings_replaceFirst">`replaceFirst()`</a> | Replace the first occurrence of a given value in the string. |
| <a href="#strings_replaceLast">`replaceLast()`</a> | Replace the last occurrence of a given value in the string. |
| <a href="#strings_start">`start()`</a> | Begin a string with a single instance of a given value. |
| <a href="#strings_startsWith">`startsWith()`</a> | Determine if a given string starts with a given substring. |
| <a href="#strings_endsWith">`endsWith()`</a> | Determine if a given string ends with a given substring. |
| <a href="#strings_finish">`finish()`</a> | Cap a string with a single instance of a given value. |
| <a href="#strings_hash">`hash()`</a> | Generate a hash string from the input string. |

<hr>

#### <a name="strings_of"></a> Method: `of()`

```php
/**
 * Initializes a Strings object and assigns both $string and $encoding properties
 * the supplied values. $string is cast to a string prior to assignment. Throws
 * an InvalidArgumentException if the first argument is an array or object
 * without a __toString method.
 *
 * @param mixed  $string   Value to modify, after being cast to string. Default: ''
 * @param string $encoding The character encoding. Default: UTF-8
 */
public static function of($string = '', string $encoding = 'UTF-8'): self
```

**Examples**

```php
$string = Strings::of('SG-1 returns from an off-world mission');
```

#### <a name="strings_stripSpaces"></a> Method: `stripSpaces()`

Strip all whitespaces from the given string.

```php
$string = Strings::of('SG-1 returns from an off-world mission')->stripSpaces();
```

#### <a name="strings_trimSlashes"></a> Method: `trimSlashes()`

Removes any leading and trailing slashes from a string.

```php
$string = Strings::trimSlashes('some string here/');
```

#### <a name="strings_reduceSlashes"></a> Method: `reduceSlashes()`

Reduces multiple slashes in a string to single slashes.

```php
$string = Strings::reduceSlashes('some//text//here');
```

#### <a name="strings_stripQuotes"></a> Method: `stripQuotes()`

Removes single and double quotes from a string.

```php
$string = Strings::stripQuotes('some "text" here');
```

#### <a name="strings_quotesToEntities"></a> Method: `quotesToEntities()`

Convert single and double quotes to entities.

```php
$string = Strings::quotesToEntities('some "text" here');
```

#### <a name="strings_validEncoding"></a> Method: `validEncoding()`

Checks if the string is valid in UTF-8 encoding.

```php
$result = Strings::validEncoding('An UTF-8 string here');
```

#### <a name="strings_fixEncoding"></a> Method: `fixEncoding()`

Removes all invalid UTF-8 characters from a string.

```php
$string = Strings::fixEncoding('An invalid UTF-8 string here');
```

#### <a name="strings_normalizeNewLines"></a> Method: `normalizeNewLines()`

Standardize line endings to unix-like.

```php
$string = Strings::normalizeNewLines('SG-1 returns from an off-world mission');
```

#### <a name="strings_normalizeSpaces"></a> Method: `normalizeSpaces()`

Normalize white-spaces to a single space.

```php
$string = Strings::normalizeSpaces('SG-1  returns  from  an  off-world  mission');
```

#### <a name="strings_random"></a> Method: `random()`

```php
// Get random string with predefined settings
$string = Strings::random();

// Get random string with custom length
$string = Strings::random(10);

// Get random string with custom length and custom keyspace
$string = Strings::random(4, '0123456789');
```

#### <a name="strings_increment"></a> Method: `increment()`

Add's `_1` to a string or increment the ending number to allow `_2`, `_3`, etc.

```php
// Increment string with predefined settings
$string = Strings::increment('page_1');

// Increment string with custom settings
$string = Strings::increment('page-1', 1, '-');
```

#### <a name="strings_wordsCount"></a> Method: `wordsCount()`

Return information about words used in a string

```php
// Returns the number of words found
$result = Strings::wordsCount('SG-1 returns from an off-world mission to P9Y-3C3 with Daniel Jackson');

// Returns an array containing all the words found inside the string
$result = Strings::wordsCount('SG-1 returns from an off-world mission to P9Y-3C3 with Daniel Jackson', 1)

// Returns an associative array, where the key is the numeric position of the word inside the string and the value is the actual word itself
$result = Strings::wordsCount('SG-1 returns from an off-world mission to P9Y-3C3 with Daniel Jackson', 2)
```

#### <a name="strings_length"></a> Method: `length()`

Return the length of the given string.

```php
$length = Strings::length('SG-1 returns from an off-world mission to P9Y-3C3');
```

#### <a name="strings_lower"></a> Method: `lower()`

Convert the given string to lower-case.

```php
$string = Strings::lower('SG-1 returns from an off-world mission to P9Y-3C3');
```

#### <a name="strings_upper"></a> Method: `upper()`

Convert the given string to upper-case.

```php
$string = Strings::upper('SG-1 returns from an off-world mission to P9Y-3C3');
```

#### <a name="strings_limit"></a> Method: `limit()`

Limit the number of characters in a string.

```php
// Get string with predefined limit settings
$string = Strings::limit('SG-1 returns from an off-world mission to P9Y-3C3');

// Get string with limit 10
$string = Strings::limit('SG-1 returns from an off-world mission to P9Y-3C3', 10);

// Get string with limit 10 and append 'read more...'
$string = Strings::limit('SG-1 returns from an off-world mission to P9Y-3C3', 10, 'read more...');
```

#### <a name="strings_studly"></a> Method: `studly()`

Convert a value to studly caps case.

```php
$string = Strings::studly('foo_bar');
```

#### <a name="strings_snake"></a> Method: `snake()`

Convert a string to snake case.

```php
$string = Strings::snake('fooBar');
```

#### <a name="strings_camel"></a> Method: `camel()`

Convert a string to camel case.

```php
$string = Strings::camel('foo_bar');
```

#### <a name="strings_kebab"></a> Method: `kebab()`

Convert a string to kebab case.

```php
$string = Strings::kebab('fooBar');
```

#### <a name="strings_words"></a> Method: `words()`

Limit the number of words in a string.

```php
// Get the number of words in a string with predefined limit settings
$string = Strings::words('SG-1 returns from an off-world mission to P9Y-3C3');

// Get the number of words in a string with limit 3
$string = Strings::words('SG-1 returns from an off-world mission to P9Y-3C3', 3);

// Get the number of words in a string with limit 3 and append 'read more...'
$string = Strings::words('SG-1 returns from an off-world mission to P9Y-3C3', 3, 'read more...');
```

#### <a name="strings_contains"></a> Method: `contains()`

Determine if a given string contains a given substring.

```php
// Determine if a given string contains a given substring.
$result = Strings::contains('SG-1 returns from an off-world mission to P9Y-3C3', 'SG-1');

// Determine if a given string contains a given array of substrings.
$result = Strings::contains('SG-1 returns from an off-world mission to P9Y-3C3', ['SG-1', 'P9Y-3C3']);
```

#### <a name="strings_containsAll"></a> Method: `containsAll()`

Determine if a given string contains a given array of substrings.

```php
$result = Strings::containsAll('SG-1 returns from an off-world mission to P9Y-3C3', ['SG-1', 'P9Y-3C3']);
```

#### <a name="strings_containsAny"></a> Method: `containsAny()`

Determine if a given string contains any of array values.

```php
$result = Strings::containsAny('SG-1 returns from an off-world mission to P9Y-3C3', ['SG-1', 'P9Y-3C3']);
```

#### <a name="strings_substr"></a> Method: `substr()`

Returns the portion of string specified by the start and length parameters.

```php
// Returns the portion of string specified by the start 0.
$string = Strings::substr('SG-1 returns from an off-world mission to P9Y-3C3', 0);

// Returns the portion of string specified by the start 0 and length 4.
$string = Strings::substr('SG-1 returns from an off-world mission to P9Y-3C3', 0, 4);
```

#### <a name="strings_ucfirst"></a> Method: `ucfirst()`

Converts the first character of a string to upper case and leaves the other characters unchanged.

```php
$string = Strings::ucfirst('daniel');
```

#### <a name="strings_trim"></a> Method: `trim()`

Strip whitespace (or other characters) from the beginning and end of a string.

```php
$string = Strings::trim(' daniel ');
```

#### <a name="strings_trimRight"></a> Method: `trimRight()`

Strip whitespace (or other characters) from the end of a string.

```php
$string = Strings::trimRight('daniel ');
```

#### <a name="strings_trimLeft"></a> Method: `trimLeft()`

Strip whitespace (or other characters) from the beginning of a string.

```php
$string = Strings::trimLeft(' daniel');
```

#### <a name="strings_capitalize"></a> Method: `capitalize()`

Converts the first character of every word of string to upper case and the others to lower case.

```php
$string = Strings::capitalize('that country was at the same stage of development as the United States in the 1940s');
```

#### <a name="strings_reverse"></a> Method: `reverse()`

Reverses string.

```php
$string = Strings::reverse('SG-1 returns from an off-world mission');
```

#### <a name="strings_segments"></a> Method: `segments()`

Get array of segments from a string based on a delimiter.

```php
// Get array of segments from a string based on a predefined delimiter.
$segments = Strings::segments('SG-1 returns from an off-world mission');

// Get array of segments from a string based on a delimiter '-'.
$segments = Strings::segments('SG-1 returns from an off-world mission', '-');
```

#### <a name="strings_segment"></a> Method: `segment()`

Get a segment from a string based on a delimiter.
Returns an empty string when the offset doesn't exist.
Use a negative index to start counting from the last element.

```php
// Get a segment 1 from a string based on a predefined delimiter.
$string = Strings::segment('SG-1 returns from an off-world mission', 1);

// Get a segment 1 from a string based on a delimiter '-'.
$string = Strings::segment('SG-1 returns from an off-world mission', 1, '-');

// Get a segment 1 from a string starting from the last based on a delimiter '-'.
$string = Strings::segment('SG-1 returns from an off-world mission', -1, '-');
```

#### <a name="strings_firstSegment"></a> Method: `firstSegment()`

Get the first segment from a string based on a delimiter.

```php
// Get a first segment from a string based on a predefined delimiter.
$string = Strings::firstSegment('SG-1 returns from an off-world mission');

// Get a first segment from a string based on a delimiter '-'.
$string = Strings::firstSegment('SG-1 returns from an off-world mission', '-');
```

#### <a name="strings_lastSegment"></a> Method: `lastSegment()`

Get the last segment from a string based on a delimiter.

```php
// Get a last segment from a string based on a predefined delimiter.
$string = Strings::lastSegment('SG-1 returns from an off-world mission');

// Get a last segment from a string based on a delimiter '-'.
$string = Strings::lastSegment('SG-1 returns from an off-world mission', '-');
```

#### <a name="strings_between"></a> Method: `between()`

Get the portion of a string between two given values.

```php
$string = Strings::between('SG-1 returns from an off-world mission', 'SG-1', 'from');
```

#### <a name="strings_before"></a> Method: `before()`

Get the portion of a string before the first occurrence of a given value.

```php
$string = Strings::before('SG-1 returns from an off-world mission', 'mission');
```

#### <a name="strings_beforeLast"></a> Method: `beforeLast()`

Get the portion of a string before the last occurrence of a given value.

```php
$string = Strings::beforeLast('SG-1 returns from an off-world mission', 'mission');
```

#### <a name="strings_after"></a> Method: `after()`

Return the remainder of a string after the first occurrence of a given value.

```php
$string = Strings::after('SG-1 returns from an off-world mission', 'SG-1');
```

#### <a name="strings_afterLast"></a> Method: `afterLast()`

Return the remainder of a string after the last occurrence of a given value.

```php
$string = Strings::afterLast('SG-1 returns from an off-world mission', 'SG-1');
```

#### <a name="strings_padBoth"></a> Method: `padBoth()`

Pad both sides of a string with another.

```php
$string = Strings::padBoth('SG-1 returns from an off-world mission', 50, '-');
```

#### <a name="strings_padRight"></a> Method: `padRight()`

Pad the right side of a string with another.

```php
$string = Strings::padRight('SG-1 returns from an off-world mission', 50, '-');
```

#### <a name="strings_padLeft"></a> Method: `padLeft()`

Pad the left side of a string with another.

```php
$string = Strings::padLeft('SG-1 returns from an off-world mission', 50, '-');
```

#### <a name="strings_replaceArray"></a> Method: `replaceArray()`

Replace a given value in the string sequentially with an array.

```php
$string = Strings::replaceArray('SG-1 returns from an off-world mission', 'SG-1', ['SG-2']);
```

#### <a name="strings_replaceFirst"></a> Method: `replaceFirst()`

Replace the first occurrence of a given value in the string.

```php
$string = Strings::replaceFirst('SG-1 returns from an off-world mission', 'SG-1', 'SG-2');
```

#### <a name="strings_replaceLast"></a> Method: `replaceLast()`

Replace the last occurrence of a given value in the string.

```php
$string = Strings::replaceLast('SG-1 returns from an off-world mission', 'off-world', 'P9Y-3C3');
```

#### <a name="strings_start"></a> Method: `start()`

Begin a string with a single instance of a given value.

```php
$string = Strings::start('movies/sg-1/season-5/episode-21/', '/');
```

#### <a name="strings_startsWith"></a> Method: `startsWith()`

Determine if a given string starts with a given substring.

```php
$result = Strings::startsWith('/movies/sg-1/season-5/episode-21/', '/');
```

#### <a name="strings_endsWith"></a> Method: `endsWith()`

Determine if a given string ends with a given substring.

```php
$result = Strings::endsWith('/movies/sg-1/season-5/episode-21/', '/');
```

#### <a name="strings_finish"></a> Method: `finish()`

Cap a string with a single instance of a given value.

```php
$result = Strings::finish('/movies/sg-1/season-5/episode-21', '/');
```

#### <a name="strings_hash"></a> Method: `hash()`

Generate a hash string from the input string.

```php
// Get string hash with predefined settings
$result = Strings::hash('SG-1 returns from an off-world mission');

// Get string hash with hashed with sha256 algorithm
$result = Strings::hash('SG-1 returns from an off-world mission', 'sha256');

// Get string hash with hashed with sha256 algorithm and with raw output
$result = Strings::hash('SG-1 returns from an off-world mission', 'sha256', true);
```

### License
[The MIT License (MIT)](https://github.com/atomastic/strings/blob/master/LICENSE.txt)
Copyright (c) 2020 [Sergey Romanenko](https://github.com/Awilum)
