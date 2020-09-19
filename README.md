<h1 align="center">Strings Component</h1>

<p align="center">
<a href="https://github.com/atomastic/strings/releases"><img alt="Version" src="https://img.shields.io/github/release/atomastic/strings.svg?label=version&color=green"></a> <a href="https://github.com/atomastic/strings"><img src="https://img.shields.io/badge/license-MIT-blue.svg?color=green" alt="License"></a> <a href="https://github.com/atomastic/strings"><img src="https://img.shields.io/github/downloads/atomastic/strings/total.svg?color=green" alt="Total downloads"></a> <img src="https://github.com/atomastic/strings/workflows/Static%20Analysis/badge.svg?branch=dev"> <img src="https://github.com/atomastic/strings/workflows/Tests/badge.svg">
  <a href="https://app.codacy.com/gh/atomastic/strings?utm_source=github.com&utm_medium=referral&utm_content=atomastic/strings&utm_campaign=Badge_Grade_Dashboard"><img src="https://api.codacy.com/project/badge/Grade/72b4dc84c20145e1b77dc0004a3c8e3d"></a>
</p>

<br>

* [Installation](#installation)
* [Usage](#usage)
* [Methods](#methods)
* [Tests](#tests)
* [License](#license)

### Installation

#### With [Composer](https://getcomposer.org)

```
composer require atomastic/strings
```

### Usage

```php
use Atomastic\Strings\Strings;

// Using public method __construct()
$strings = new Strings();

// Using public static method create()
$strings = Strings::create();

// Using global helper function strings()
$strings = strings();
```

### Methods

| Method | Description |
|---|---|
| <a href="#strings_of">`create()`</a> | Initializes a Strings object and assigns both $string and $encoding properties the supplied values. $string is cast to a string prior to assignment. Throws an InvalidArgumentException if the first argument is an array or object without a `__toString` method. |
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

#### Methods Details

##### <a name="strings_of"></a> Method: `create()`

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
$string = Strings::create('SG-1 returns from an off-world mission');
```

##### <a name="strings_stripSpaces"></a> Method: `stripSpaces()`

```php
/**
 * Strip all whitespaces from the given string.
 */
public function stripSpaces(): self
```

**Examples**

```php
$string = Strings::create('SG-1 returns from an off-world mission')->stripSpaces();
```

##### <a name="strings_trimSlashes"></a> Method: `trimSlashes()`

```php
/**
 * Removes any leading and traling slashes from a string.
 */
public function trimSlashes(): self
```

**Examples**

```php
$string = Strings::create('some string here/')->trimSlashes();
```

##### <a name="strings_reduceSlashes"></a> Method: `reduceSlashes()`

```php
/**
 * Reduces multiple slashes in a string to single slashes.
 */
public function reduceSlashes(): self
```    

**Examples**

```php
$string = Strings::create('some//text//here')->reduceSlashes();
```

##### <a name="strings_stripQuotes"></a> Method: `stripQuotes()`

```php
/**
 * Removes single and double quotes from a string.
 */
public function stripQuotes(): self
```

**Examples**

```php
$string = Strings::create('some "text" here')->stripQuotes();
```

##### <a name="strings_quotesToEntities"></a> Method: `quotesToEntities()`

```php
/**
 * Convert single and double quotes to entities.
 *
 * @param  string $string String with single and double quotes
 */
```

**Examples**

```php
$string = Strings::create('some "text" here')->quotesToEntities();
```

##### <a name="strings_normalizeNewLines"></a> Method: `normalizeNewLines()`

```php
/**
 * Standardize line endings to unix-like.
 */
public function normalizeNewLines(): self
```

**Examples**

```php
$string = Strings::create('SG-1 returns from an off-world mission')->normalizeNewLines();
```

##### <a name="strings_normalizeSpaces"></a> Method: `normalizeSpaces()`

```php
/**
 * Normalize white-spaces to a single space.
 */
public function normalizeSpaces(): self
```

**Examples**

```php
$string = Strings::create('SG-1  returns  from  an  off-world  mission')->normalizeSpaces();
```

##### <a name="strings_random"></a> Method: `random()`

```php
/**
 * Creates a random string of characters.
 *
 * @param  int    $length   The number of characters. Default is 16
 * @param  string $keyspace The keyspace
 */
public function random(int $length = 64, string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'): self
```

**Examples**

```php
// Get random string with predefined settings
$string = Strings::create()->random();

// Get random string with custom length
$string = Strings::create()->random(10);

// Get random string with custom length and custom keyspace
$string = Strings::create()->random(4, '0123456789');
```

##### <a name="strings_increment"></a> Method: `increment()`

```php
/**
 * Add's _1 to a string or increment the ending number to allow _2, _3, etc.
 *
 * @param  int    $first     Start with
 * @param  string $separator Separator
 */
public function increment(int $first = 1, string $separator = '_')
```

**Examples**

```php
// Increment string with predefined settings
$string = Strings::create('page_1')->increment();

// Increment string with custom settings
$string = Strings::create('page-1')->increment(1, '-');
```

##### <a name="strings_wordsCount"></a> Method: `wordsCount()`

```php
/**
 * Return information about words used in a string
 *
 * @param  int    $format   Specify the return value of this function. The current supported values are:
 *                          0 - returns the number of words found
 *                          1 - returns an array containing all the words found inside the string
 *                          2 - returns an associative array, where the key is the numeric position of the word inside the string and the value is the actual word itself
 * @param  string $charlist A list of additional characters which will be considered as 'word'
 */
public function wordsCount(int $format = 0, string $charlist = '')
```

**Examples**

```php
// Returns the number of words found
$result = Strings::create('SG-1 returns from an off-world mission to P9Y-3C3 with Daniel Jackson')->wordsCount();

// Returns an array containing all the words found inside the string
$result = Strings::create('SG-1 returns from an off-world mission to P9Y-3C3 with Daniel Jackson')->wordsCount(1);

// Returns an associative array, where the key is the numeric position of the word inside the string and the value is the actual word itself
$result = Strings::create('SG-1 returns from an off-world mission to P9Y-3C3 with Daniel Jackson')->wordsCount(2);
```

##### <a name="strings_length"></a> Method: `length()`

```php
/**
 * Return the length of the given string.
 */
public function length(): int
```

**Examples**

```php
$length = Strings::create('SG-1 returns from an off-world mission to P9Y-3C3')->length();
```

##### <a name="strings_lower"></a> Method: `lower()`

```
/**
 * Convert the given string to lower-case.
 */
public function lower(): self
```

**Examples**

```php
$string = Strings::create('SG-1 returns from an off-world mission to P9Y-3C3')->lower();
```

##### <a name="strings_upper"></a> Method: `upper()`

```php
/**
 * Convert the given string to upper-case.
 */
public function upper(): self
```

**Examples**

```php
$string = Strings::create('SG-1 returns from an off-world mission to P9Y-3C3')->upper();
```

##### <a name="strings_limit"></a> Method: `limit()`

```php
/**
 * Limit the number of characters in a string.
 *
 * @param  int    $limit  Limit of characters
 * @param  string $append Text to append to the string IF it gets truncated
 */
public function limit(int $limit = 100, string $append = '...'): self
```

**Examples**

```php
// Get string with predefined limit settings
$string = Strings::create('SG-1 returns from an off-world mission to P9Y-3C3')->limit();

// Get string with limit 10
$string = Strings::create('SG-1 returns from an off-world mission to P9Y-3C3')->limit(10);

// Get string with limit 10 and append 'read more...'
$string = Strings::create('SG-1 returns from an off-world mission to P9Y-3C3')->limit(10, 'read more...');
```

##### <a name="strings_studly"></a> Method: `studly()`

```php
/**
 * Convert a string to studly caps case.
 */
public function studly(): self
```

**Examples**

```php
$string = Strings::create('foo_bar')->studly();
```

##### <a name="strings_snake"></a> Method: `snake()`

```php
/**
 * Convert a string to snake case.
 *
 * @param  string $delimiter Delimeter
 */
public function snake(string $delimiter = '_'): self
```

**Examples**

```php
$string = Strings::create('fooBar')->snake();
```

##### <a name="strings_camel"></a> Method: `camel()`

```php
/**
 * Convert a string to camel case.
 */
public function camel(): self
```

**Examples**

```php
$string = Strings::create('foo_bar')->camel();
```

##### <a name="strings_kebab"></a> Method: `kebab()`

```php
/**
 * Convert a string to kebab case.
 */
public function kebab(): self
```

**Examples**

```php
$string = Strings::create('fooBar')->kebab();
```

##### <a name="strings_words"></a> Method: `words()`

```php
/**
 * Limit the number of words in a string.
 *
 * @param  int    $words  Words limit
 * @param  string $append Text to append to the string IF it gets truncated
 */
public function words(int $words = 100, string $append = '...'): self
```

**Examples**

```php
// Get the number of words in a string with predefined limit settings
$string = Strings::create('SG-1 returns from an off-world mission to P9Y-3C3')->words();

// Get the number of words in a string with limit 3
$string = Strings::create('SG-1 returns from an off-world mission to P9Y-3C3')->words(3);

// Get the number of words in a string with limit 3 and append 'read more...'
$string = Strings::create('SG-1 returns from an off-world mission to P9Y-3C3')->words(3, 'read more...');
```

##### <a name="strings_contains"></a> Method: `contains()`

```php
/**
 * Determine if a given string contains a given substring.
 *
 * @param  string|string[] $needles The string to find in haystack.
 */
public function contains($needles): bool
```

**Examples**

```php
// Determine if a given string contains a given substring.
$result = Strings::create('SG-1 returns from an off-world mission to P9Y-3C3')->contains('SG-1');

// Determine if a given string contains a given array of substrings.
$result = Strings::create('SG-1 returns from an off-world mission to P9Y-3C3')->contains(['SG-1', 'P9Y-3C3']);
```

##### <a name="strings_containsAll"></a> Method: `containsAll()`

```php
/**
 * Determine if a given string contains all array values.
 *
 * @param  string[] $needles The array of strings to find in haystack.
 */
public function containsAll(array $needles): bool
```

**Examples**

```php
$result = Strings::create('SG-1 returns from an off-world mission to P9Y-3C3')->containsAll(['SG-1', 'P9Y-3C3']);
```

##### <a name="strings_containsAny"></a> Method: `containsAny()`

```php
/**
 * Determine if a given string contains any of array values.
 *
 * @param  string   $haystack The string being checked.
 * @param  string[] $needles  The array of strings to find in haystack.
 */
public function containsAny(array $needles): bool
```

**Examples**

```php
$result = Strings::create('SG-1 returns from an off-world mission to P9Y-3C3')->containsAny(['SG-1', 'P9Y-3C3']);
```

##### <a name="strings_substr"></a> Method: `substr()`

```php
/**
 * Returns the portion of string specified by the start and length parameters.
 *
 * @param  int      $start  If start is non-negative, the returned string will
 *                          start at the start'th position in $string, counting from zero.
 *                          For instance, in the string 'abcdef', the character at position
 *                          0 is 'a', the character at position 2 is 'c', and so forth.
 * @param  int|null $length Maximum number of characters to use from string.
 *                          If omitted or NULL is passed, extract all characters to the end of the string.
 */
public function substr(int $start, ?int $length = null): self
```

**Examples**

```php
// Returns the portion of string specified by the start 0.
$string = Strings::create('SG-1 returns from an off-world mission to P9Y-3C3')->substr(0);

// Returns the portion of string specified by the start 0 and length 4.
$string = Strings::create('SG-1 returns from an off-world mission to P9Y-3C3')->substr(0, 4);
```

##### <a name="strings_ucfirst"></a> Method: `ucfirst()`

```php
/**
 * Converts the first character of a string to upper case
 * and leaves the other characters unchanged.
 */
public function ucfirst(): self
```

**Examples**

```php
$string = Strings::create('daniel')->ucfirst();
```

##### <a name="strings_trim"></a> Method: `trim()`

```php
/**
 * Strip whitespace (or other characters) from the beginning and end of a string.
 *
 * @param string $character_mask Optionally, the stripped characters can also be
 *                               specified using the character_mask parameter..
 */
public function trim(string $character_mask = " \t\n\r\0\x0B"): self
```

**Examples**

```php
$string = Strings::create(' daniel ')->trim();
```

##### <a name="strings_trimRight"></a> Method: `trimRight()`

```php
/**
 * Strip whitespace (or other characters) from the end of a string.
 *
 * @param string $character_mask Optionally, the stripped characters can also be
 *                               specified using the character_mask parameter..
 */
public function trimRight(string $character_mask = " \t\n\r\0\x0B"): self
```

**Examples**

```php
$string = Strings::create('daniel ')->trimRight();
```

##### <a name="strings_trimLeft"></a> Method: `trimLeft()`

```
/**
 * Strip whitespace (or other characters) from the beginning of a string.
 *
 * @param string $character_mask Optionally, the stripped characters can also be
 *                               specified using the character_mask parameter..
 */
public function trimLeft(string $character_mask = " \t\n\r\0\x0B"): self
```

**Examples**

```php
$string = Strings::create(' daniel')->trimLeft();
```

##### <a name="strings_capitalize"></a> Method: `capitalize()`

```php
/**
 * Converts the first character of every word of string to upper case and the others to lower case.
 */
public function capitalize(): self
```

**Examples**

```php
$string = Strings::create('that country was at the same stage of development as the United States in the 1940s')->capitalize();
```

##### <a name="strings_reverse"></a> Method: `reverse()`

```php
/**
 * Reverses string.
 */
public function reverse(): self
```

**Examples**

```php
$string = Strings::create('SG-1 returns from an off-world mission')->reverse();
```

##### <a name="strings_segments"></a> Method: `segments()`

```php
/**
 * Get array of segments from a string based on a delimiter.
 *
 * @param string $delimiter Delimeter
 */
public function segments(string $delimiter = ' '): array
```

**Examples**

```php
// Get array of segments from a string based on a predefined delimiter.
$segments = Strings::create('SG-1 returns from an off-world mission')->segments();

// Get array of segments from a string based on a delimiter '-'.
$segments = Strings::create('SG-1 returns from an off-world mission')->segments('-');
```

##### <a name="strings_segment"></a> Method: `segment()`

```php
/**
 * Get a segment from a string based on a delimiter.
 * Returns an empty string when the offset doesn't exist.
 * Use a negative index to start counting from the last element.
 *
 * @param int    $index     Index
 * @param string $delimiter Delimeter
 */
public function segment(int $index, string $delimiter = ' '): self
```

**Examples**

```php
// Get a segment 1 from a string based on a predefined delimiter.
$string = Strings::create('SG-1 returns from an off-world mission')->segment(1);

// Get a segment 1 from a string based on a delimiter '-'.
$string = Strings::create('SG-1 returns from an off-world mission')->segment(1, '-');

// Get a segment 1 from a string starting from the last based on a delimiter '-'.
$string = Strings::create('SG-1 returns from an off-world mission')->segment(-1, '-');
```

##### <a name="strings_firstSegment"></a> Method: `firstSegment()`

```php
/**
 * Get the first segment from a string based on a delimiter.
 *
 * @param string $delimiter Delimeter
 */
public function firstSegment(string $delimiter = ' '): self
```

**Examples**

```php
// Get a first segment from a string based on a predefined delimiter.
$string = Strings::create('SG-1 returns from an off-world mission')->firstSegment();

// Get a first segment from a string based on a delimiter '-'.
$string = Strings::create('SG-1 returns from an off-world mission')->firstSegment('-');
```

##### <a name="strings_lastSegment"></a> Method: `lastSegment()`

```php
/**
 * Get the last segment from a string based on a delimiter.
 *
 * @param string $string    String
 * @param string $delimiter Delimeter
 */
public function lastSegment(string $delimiter = ' '): self
```

**Examples**

```php
// Get a last segment from a string based on a predefined delimiter.
$string = Strings::create('SG-1 returns from an off-world mission')->lastSegment();

// Get a last segment from a string based on a delimiter '-'.
$string = Strings::create('SG-1 returns from an off-world mission')->lastSegment('-');
```

##### <a name="strings_between"></a> Method: `between()`

```php
/**
 * Get the portion of a string between two given values.
 *
 * @param  string $from From
 * @param  string $to   To
 */
public function between(string $from, string $to): self
```

**Examples**

```php
$string = Strings::create('SG-1 returns from an off-world mission')->between('SG-1', 'from');
```

##### <a name="strings_before"></a> Method: `before()`

```php
/**
 * Get the portion of a string before the first occurrence of a given value.
 *
 * @param string $search Search
 */
public function before(string $search): self
```

**Examples**

```php
$string = Strings::create('SG-1 returns from an off-world mission')->before('mission');
```

##### <a name="strings_beforeLast"></a> Method: `beforeLast()`

```php
/**
 * Get the portion of a string before the last occurrence of a given value.
 *
 * @param string $search Search
 */
public function beforeLast(string $search): self
```

**Examples**

```php
$string = Strings::create('SG-1 returns from an off-world mission')->beforeLast('mission');
```

##### <a name="strings_after"></a> Method: `after()`

```php
/**
 * Return the remainder of a string after the first occurrence of a given value.
 *
 * @param string $search Search
 */
public function after(string $search): self
```

**Examples**

```php
$string = Strings::create('SG-1 returns from an off-world mission')->after('SG-1');
```

##### <a name="strings_afterLast"></a> Method: `afterLast()`

```php
/**
 * Return the remainder of a string after the last occurrence of a given value.
 *
 * @param string $search Search
 */
public function afterLast(string $search): self
```

**Examples**

```php
$string = Strings::create('SG-1 returns from an off-world mission')->afterLast('SG-1');
```

##### <a name="strings_padBoth"></a> Method: `padBoth()`

```php
/**
 * Pad both sides of a string with another.
 *
 * @param  int    $length If the value of pad_length is negative, less than, or equal to the length of the input string, no padding takes place, and input will be returned.
 * @param  string $pad    The pad string may be truncated if the required number of padding characters can't be evenly divided by the pad_string's length.
 */
public function padBoth(int $length, string $pad = ' '): self
```

**Examples**

```php
$string = Strings::create('SG-1 returns from an off-world mission')->padBoth(50, '-');
```

##### <a name="strings_padRight"></a> Method: `padRight()`

```php
/**
 * Pad the right side of a string with another.
 *
 * @param  int    $length If the value of pad_length is negative, less than, or equal to the length of the input string, no padding takes place, and input will be returned.
 * @param  string $pad    The pad string may be truncated if the required number of padding characters can't be evenly divided by the pad_string's length.
 */
public function padRight(int $length, string $pad = ' '): self
```

**Examples**

```php
$string = Strings::create('SG-1 returns from an off-world mission')->padRight(50, '-');
```

##### <a name="strings_padLeft"></a> Method: `padLeft()`
```php
/**
 * Pad the left side of a string with another.
 *
 * @param  int    $length If the value of pad_length is negative, less than, or equal to the length of the input string, no padding takes place, and input will be returned.
 * @param  string $pad    The pad string may be truncated if the required number of padding characters can't be evenly divided by the pad_string's length.
 */
public function padLeft(int $length, string $pad = ' '): self
```
**Examples**

```php
$string = Strings::create('SG-1 returns from an off-world mission')->padLeft(50, '-');
```

##### <a name="strings_replaceArray"></a> Method: `replaceArray()`

```php
/**
 * Replace a given value in the string sequentially with an array.
 *
 * @param  string $search  Search
 * @param  array  $replace Replace
 */
public function replaceArray(string $search, array $replace): self
```

**Examples**

```php
$string = Strings::create('SG-1 returns from an off-world mission')->replaceArray('SG-1', ['SG-2']);
```

##### <a name="strings_replaceFirst"></a> Method: `replaceFirst()`

```php
/**
 * Replace the first occurrence of a given value in the string.
 *
 * @param  string $search  Search
 * @param  string $replace Replace
 */
public function replaceFirst(string $search, string $replace): self
```

**Examples**

```php
$string = Strings::create('SG-1 returns from an off-world mission')->replaceFirst('SG-1', 'SG-2');
```

##### <a name="strings_replaceLast"></a> Method: `replaceLast()`

```php
/**
 * Replace the last occurrence of a given value in the string.
 *
 * @param  string $search  Search
 * @param  string $replace Replace
 */
public function replaceLast(string $search, string $replace): self
```

**Examples**

```php
$string = Strings::create('SG-1 returns from an off-world mission')->replaceLast('off-world', 'P9Y-3C3');
```

##### <a name="strings_start"></a> Method: `start()`

```php
/**
 * Begin a string with a single instance of a given value.
 *
 * @param  string $prefix Prefix
 */
public function start(string $prefix): self
```

**Examples**

```php
$string = Strings::create('movies/sg-1/season-5/episode-21/')->start('/');
```

##### <a name="strings_startsWith"></a> Method: `startsWith()`

```php
/**
 * Determine if a given string starts with a given substring.
 *
 * @param  string|string[] $needles needles
 */
public function startsWith($needles): bool
```

**Examples**

```php
$result = Strings::create('/movies/sg-1/season-5/episode-21/')->startsWith('/');
```

##### <a name="strings_endsWith"></a> Method: `endsWith()`

```php
/**
 * Determine if a given string ends with a given substring.
 *
 * @param  string|string[] $needles needles
 */
public function endsWith($needles): bool
```

**Examples**

```php
$result = Strings::create('/movies/sg-1/season-5/episode-21/')->endsWith('/');
```

##### <a name="strings_finish"></a> Method: `finish()`

```php
/**
 * Cap a string with a single instance of a given value.
 *
 * @param  string $cap Cap
 */
public function finish(string $cap): self
```

**Examples**

```php
$result = Strings::create('/movies/sg-1/season-5/episode-21')->finish('/');
```

##### <a name="strings_hash"></a> Method: `hash()`

```php
/**
 * Generate a hash string from the input string.
 *
 * @param  string $string     String
 * @param  string $algorithm  Name of selected hashing algorithm (i.e. "md5", "sha256", "haval160,4", etc..).
 *                            For a list of supported algorithms see hash_algos(). Default is md5.
 * @param  string $raw_output When set to TRUE, outputs raw binary data. FALSE outputs lowercase hexits. Default is FALSE
 */
public function hash(string $algorithm = 'md5', bool $raw_output = false): self
```

**Examples**

```php
// Get string hash with predefined settings
$result = Strings::create('SG-1 returns from an off-world mission')->hash();

// Get string hash with hashed with sha256 algorithm
$result = Strings::create('SG-1 returns from an off-world mission')->hash('sha256');

// Get string hash with hashed with sha256 algorithm and with raw output
$result = Strings::create('SG-1 returns from an off-world mission')->hash('sha256', true);
```

### Tests

Run tests

```
./vendor/bin/pest
```

### License
[The MIT License (MIT)](https://github.com/atomastic/strings/blob/master/LICENSE.txt)
Copyright (c) 2020 [Sergey Romanenko](https://github.com/Awilum)
