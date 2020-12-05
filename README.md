<h1 align="center">Strings Component</h1>
<p align="center">
Strings Component provide a fluent, object-oriented interface for working with multibyte string, allowing you to chain multiple string operations together using a more readable syntax compared to traditional PHP strings functions.
</p>

<p align="center">
<a href="https://github.com/atomastic/strings/releases"><img alt="Version" src="https://img.shields.io/github/release/atomastic/strings.svg?label=version&color=green"></a> <a href="https://github.com/atomastic/strings"><img src="https://img.shields.io/badge/license-MIT-blue.svg?color=green" alt="License"></a> <a href="https://packagist.org/packages/atomastic/strings"><img src="https://poser.pugx.org/atomastic/strings/downloads" alt="Total downloads"></a> <img src="https://github.com/atomastic/strings/workflows/Static%20Analysis/badge.svg?branch=dev"> <img src="https://github.com/atomastic/strings/workflows/Tests/badge.svg">
  <a href="https://app.codacy.com/gh/atomastic/strings?utm_source=github.com&utm_medium=referral&utm_content=atomastic/strings&utm_campaign=Badge_Grade_Dashboard"><img src="https://api.codacy.com/project/badge/Grade/72b4dc84c20145e1b77dc0004a3c8e3d"></a> <a href="https://codeclimate.com/github/atomastic/strings/maintainability"><img src="https://api.codeclimate.com/v1/badges/b1e18970e78af3a48a0d/maintainability"/></a>
</p>

<br>

* [Installation](#installation)
* [Usage](#usage)
* [Exteding](#extending)
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

// Create Strings instance using public method __construct()
$strings = new Strings();

// Create Strings instance using public static method create()
$strings = Strings::create();

// Create Strings instance using global helper function strings()
$strings = strings();
```

### Extending

Strings are "macroable", which allows you to add additional methods to the Strings class at run time. For example, the following code adds a customMethod method to the Strings class:

```php
use Atomastic\Strings\Strings;
use Atomastic\Macroable\Macroable;

Strings::macro('concatenate', function(string $string) {
    return $this->toString() . $string;
});

$strings = new Strings('Hello');

echo $strings->concatenate(' World');
```

##### The above example will output:

```
Hello World
```

### Methods

| Method | Description |
|---|---|
| <a href="#strings_create">`create()`</a> | Initializes a Strings object and assigns both `$string` and `$encoding` properties the supplied values. `$string` is cast to a string prior to assignment. Throws an InvalidArgumentException if the first argument is an array or object without a `__toString` method. |
| <a href="#strings_setEncoding">`setEncoding()`</a> | Set the character encoding. |
| <a href="#strings_getEncoding">`getEncoding()`</a> | Get the character encoding. |
| <a href="#strings_stripSpaces">`stripSpaces()`</a> | Strip all whitespaces from the given string. |
| <a href="#strings_reduceSlashes">`reduceSlashes()`</a> | Reduces multiple slashes in a string to single slashes. |
| <a href="#strings_stripQuotes">`stripQuotes()`</a> | Removes single and double quotes from a string. |
| <a href="#strings_quotesToEntities">`quotesToEntities()`</a> | Convert single and double quotes to entities. |
| <a href="#strings_normalizeNewLines">`normalizeNewLines()`</a> | Standardize line endings to unix-like. |
| <a href="#strings_normalizeSpaces">`normalizeSpaces()`</a> | Normalize white-spaces to a single space. |
| <a href="#strings_random">`random()`</a> | Creates a random string of characters. |
| <a href="#strings_increment">`increment()`</a> | Add's `_1` to a string or increment the ending number to allow `_2`, `_3`, etc. |
| <a href="#strings_repeat">`repeat()`</a> | Returns a repeated string given a multiplier. |
| <a href="#strings_length">`length()`</a> | Return the length of the given string. |
| <a href="#strings_copy">`copy()`</a> | Creates a new Strings object with the same string. |
| <a href="#strings_count">`count()`</a> | Returns the length of the string, analog to `length()`. |
| <a href="#strings_wordsCount">`wordsCount()`</a> | Get words count from the string. |
| <a href="#strings_countSubString">`countSubString()`</a> | Returns the number of occurrences of `$substring` in the given string. By default, the comparison is case-sensitive, but can be made insensitive by setting `$caseSensitive` to false. |
| <a href="#strings_lower">`lower()`</a> | Convert the given string to lower-case. |
| <a href="#strings_upper">`upper()`</a> | Convert the given string to upper-case. |
| <a href="#strings_limit">`limit()`</a> | Limit the number of characters in a string. |
| <a href="#strings_studly">`studly()`</a> | Convert a value to studly caps case. |
| <a href="#strings_snake">`snake()`</a> | Convert a string to snake case. |
| <a href="#strings_camel">`camel()`</a> | Convert a string to camel case. |
| <a href="#strings_kebab">`kebab()`</a> | Convert a string to kebab case. |
| <a href="#strings_lines">`lines()`</a> | Get array of individual lines in the string. |
| <a href="#strings_words">`words()`</a> | Get words from the string. |
| <a href="#strings_wordsLimit">`wordsLimit()`</a> | Limit the number of words in a string. |
| <a href="#strings_wordsFrequency">`wordsFrequency()`</a> | Get words usage frequency array. |
| <a href="#strings_charsFrequency">`charsFrequency()`</a> | Get chars usage frequency array. |
| <a href="#strings_contains">`contains()`</a> | Determine if a given string contains a given substring. By default, the comparison is case-sensitive, but can be made insensitive by setting `$caseSensitive` to false. |
| <a href="#strings_containsAll">`containsAll()`</a> | Determine if a given string contains all array values. By default, the comparison is case-sensitive, but can be made insensitive by setting `$caseSensitive` to false. |
| <a href="#strings_containsAny">`containsAny()`</a> | Determine if a given string contains any of array values. By default, the comparison is case-sensitive, but can be made insensitive by setting `$caseSensitive` to false.|
| <a href="#strings_substr">`substr()`</a> | Returns the portion of string specified by the start and length parameters. |
| <a href="#strings_ucfirst">`ucfirst()`</a> | Converts the first character of a UTF-8 string to upper case and leaves the other characters unchanged. |
| <a href="#strings_trim">`trim()`</a> | Strip whitespace (or other characters) from the beginning and end of a string. |
| <a href="#strings_trimRight">`trimRight()`</a> | Strip whitespace (or other characters) from the end of a string. |
| <a href="#strings_trimLeft">`trimLeft()`</a> | Strip whitespace (or other characters) from the beginning of a string. |
| <a href="#strings_trimSlashes">`trimSlashes()`</a> | Removes any leading and trailing slashes from a string. |
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
| <a href="#strings_pipe">`pipe()`</a> | Passes the strings to the given callback and return the result. |
| <a href="#strings_padBoth">`padBoth()`</a> | Pad both sides of a string with another. |
| <a href="#strings_padLeft">`padLeft()`</a> | Pad the left side of a string with another. |
| <a href="#strings_padRight">`padRight()`</a> | Pad the right side of a string with another. |
| <a href="#strings_replacePunctuations">`replacePunctuations()`</a> | Replace all dashes characters in the string with the given value. |
| <a href="#strings_replaceDashes">`replaceDashes()`</a> | Replace all punctuations characters in the string with the given value. |
| <a href="#strings_replaceNonAlphanumeric">`replaceNonAlphanumeric()`</a> | Replace none alphanumeric characters in the string with the given value. |
| <a href="#strings_replaceNonAlpha">`replaceNonAlpha()`</a> | Replace none alpha characters in the string with the given value. |
| <a href="#strings_replace">`replace()`</a> | Replace the given value in the given string. |
| <a href="#strings_replaceArray">`replaceArray()`</a> | Replace a given value in the string sequentially with an array. |
| <a href="#strings_replaceFirst">`replaceFirst()`</a> | Replace the first occurrence of a given value in the string. |
| <a href="#strings_replaceLast">`replaceLast()`</a> | Replace the last occurrence of a given value in the string. |
| <a href="#strings_start">`start()`</a> | Begin a string with a single instance of a given value. |
| <a href="#strings_startsWith">`startsWith()`</a> | Determine if a given string starts with a given substring. |
| <a href="#strings_endsWith">`endsWith()`</a> | Determine if a given string ends with a given substring. |
| <a href="#strings_finish">`finish()`</a> | Cap a string with a single instance of a given value. |
| <a href="#strings_hash">`hash()`</a> | Generate a hash string from the input string. |
| <a href="#strings_prepend">`prepend()`</a> | The prepend method prepends the given values onto the string. |
| <a href="#strings_append">`append()`</a> | The append method appends the given values to the string. |
| <a href="#strings_getIterator">`getIterator()`</a> | Returns a new ArrayIterator, thus implementing the IteratorAggregate interface. The ArrayIterator's constructor is passed an array of chars in the multibyte string. This enables the use of foreach with instances of Strings\Strings. |
| <a href="#strings_shuffle">`shuffle()`</a> | Randomly shuffles a string. |
| <a href="#strings_similarity">`similarity()`</a> | Calculate the similarity between two strings. |
| <a href="#strings_at">`at()`</a> | Returns the character at `$index`, with indexes starting at 0. |
| <a href="#strings_indexOf">`indexOf()`</a> | Returns the index of the first occurrence of `$needle` in the string, and false if not found. Accepts an optional offset from which to begin the search. By default, search is case-sensitive, but can be made insensitive by setting `$caseSensitive` to false.  |
| <a href="#strings_indexOfLast">`indexOfLast()`</a> | Returns the index of the last occurrence of `$needle` in the string, and false if not found. Accepts an optional `$offset` from which to begin the search. Offsets may be negative to count from the last character in the string. By default, search is case-sensitive, but can be made insensitive by setting `$caseSensitive` to false. |
| <a href="#strings_move">`move()`</a> | Move substring of desired `$length` to `$destination` index of the original string. In case $destination is less than $length returns the string untouched. |
| <a href="#strings_insert">`insert()`</a> | Inserts `$substring` into the string at the $index provided. |
| <a href="#strings_toString">`toString()`</a> | Return Strings object as string. |
| <a href="#strings_toInteger">`toInteger()`</a> | Return Strings object as integer. |
| <a href="#strings_toFloat">`toFloat()`</a> | Return Strings object as float. |
| <a href="#strings_toBoolean">`toBoolean()`</a> | Returns a boolean representation of the given logical string value. <br><br>For example:<br> 'true', '1', 'on' and 'yes' will return true.<br>'false', '0', 'off', and 'no' will return false.<br><br>In all instances, case is ignored.<br><br>For other numeric strings, their sign will determine the return value. In addition, blank strings consisting of only whitespace will return false. For all other strings, the return value is a result of a boolean cast.|
| <a href="#strings_toArray">`toArray()`</a> | Return Strings object as array based on a delimiter. |
| <a href="#strings_isEmpty">`isEmpty()`</a> | Returns true if the string is not empty, false otherwise. |
| <a href="#strings_isAscii">`isAscii()`</a> | Returns true if the string contains ASCII, false otherwise. |
| <a href="#strings_isAlphanumeric">`isAlphanumeric()`</a> | Returns true if the string contains only alphabetic and numeric chars, false otherwise. |
| <a href="#strings_isAlpha">`isAlpha()`</a> | Returns true if the string contains only alphabetic and numeric chars, false otherwise. |
| <a href="#strings_isBlank">`isBlank()`</a> | Returns true if the string contains only whitespace chars, false otherwise. |
| <a href="#strings_isNumeric">`isNumeric()`</a> | Returns true if the string is a number or a numeric strings, false otherwise. |
| <a href="#strings_isDigit">`isDigit()`</a> | Returns true if the string contains only digit chars, false otherwise. |
| <a href="#strings_isLower">`isLower()`</a> | Returns true if the string contains only lower case chars, false otherwise. |
| <a href="#strings_isUpper">`isUpper()`</a> | Returns true if the string contains only upper case chars, false otherwise. |
| <a href="#strings_isEmail">`isEmail()`</a> | Returns true if the string is email and it is valid, false otherwise. |
| <a href="#strings_isHexadecimal">`isHexadecimal()`</a> | Returns true if the string contains only hexadecimal chars, false otherwise. |
| <a href="#strings_isPrintable">`isPrintable()`</a> | Returns true if the string contains only printable (non-invisible) chars, false otherwise. |
| <a href="#strings_isPunctuation">`isPunctuation()`</a> | Returns true if the string contains only punctuation chars, false otherwise. |
| <a href="#strings_isSerialized">`isSerialized()`</a> | Returns true if the string is serialized, false otherwise. |
| <a href="#strings_isJson">`isJson()`</a> | Returns true if the string is JSON, false otherwise. |
| <a href="#strings_isBase64">`isBase64()`</a> | Returns true if the string is base64 encoded, false otherwise. |
| <a href="#strings_isSimilar">`isSimilar()`</a> | Check if two strings are similar. |
| <a href="#strings_isEqual">`isEqual()`</a> | Determine whether the string is equals to `$string`. |
| <a href="#strings_isIP">`isIP()`</a> | Determine whether the string is IP and it is a valid IP address. |
| <a href="#strings_isMAC">`isMAC()`</a> | Determine whether the string is MAC address and it is a valid MAC address. |
| <a href="#strings_isHTML">`isHTML()`</a> | Determine whether the string is HTML. |
| <a href="#strings_isBoolean">`isBoolean()`</a> | Determine whether the string is Boolean. |
| <a href="#strings_isTrue">`isTrue()`</a> | Determine whether the string is Boolean and it is TRUE. |
| <a href="#strings_isFalse">`isFalse()`</a> | Determine whether the string is Boolean and it is FALSE. |
| <a href="#strings_offsetGet">`offsetGet()`</a> | Returns the character at the given index. Offsets may be negative to count from the last character in the string. Implements part of the ArrayAccess interface, and throws an OutOfBoundsException if the index does not exist. |
| <a href="#strings_offsetSet">`offsetSet()`</a> | Implements part of the ArrayAccess interface, but throws an exception when called. This maintains the immutability of Strings objects. |
| <a href="#strings_offsetUnset">`offsetUnset()`</a> | Implements part of the ArrayAccess interface, but throws an exception when called. This maintains the immutability of Strings objects. |
| <a href="#strings_offsetExists">`offsetExists()`</a> | Returns whether or not a character exists at an index. Offsets may be negative to count from the last character in the string. Implements part of the ArrayAccess interface. |
| <a href="#strings_wordsSortAsc">`wordsSortAsc()`</a> | Sort words in the string ascending. |
| <a href="#strings_wordsSortDesc">`wordsSortDesc()`</a> | Sort words in the string descending. |

#### Methods Details


##### <a name="strings_create"></a> Method: `create()`

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
public static function create($string = '', $encoding = 'UTF-8'): self
```

##### Example

```php
$string = Strings::create('SG-1 returns from an off-world mission');
```

##### <a name="strings_setEncoding"></a> Method: `setEncoding()`

```php
/**
 * Set the character encoding.
 *
 * @param string $encoding Character encoding.
 */
public function setEncoding(string $encoding): self
```

##### Example

```php
$string = Strings::create('SG-1 returns from an off-world mission')->setEncoding('UTF-8');
```

##### <a name="strings_getEncoding"></a> Method: `getEncoding()`

```php
/**
 * Get character encoding.
 */
public function getEncoding(): string
```

##### Example

```php
$encoding = Strings::create('SG-1 returns from an off-world mission')->getEncoding();
```

##### <a name="strings_stripSpaces"></a> Method: `stripSpaces()`

```php
/**
 * Strip all whitespaces from the given string.
 */
public function stripSpaces(): self
```

##### Example

```php
$string = Strings::create('SG-1 returns from an off-world mission')->stripSpaces();
```

##### <a name="strings_reduceSlashes"></a> Method: `reduceSlashes()`

```php
/**
 * Reduces multiple slashes in a string to single slashes.
 */
public function reduceSlashes(): self
```    

##### Example

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

##### Example

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
public function quotesToEntities(): self
```

##### Example

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

##### Example

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

##### Example

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

##### Example

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

##### Example

```php
// Increment string with predefined settings
$string = Strings::create('page_1')->increment();

// Increment string with custom settings
$string = Strings::create('page-1')->increment(1, '-');
```

##### <a name="strings_repeat"></a> Method: `repeat()`

```php
/**
 * Returns a repeated string given a multiplier.
 *
 * @param int $multiplier The number of times to repeat the string.
 */
public function repeat(int $multiplier): self
```

##### Example

```php
$string = Strings::create('fòô')->repeat(3);
```


##### <a name="strings_copy"></a> Method: `copy()`

```php
/**
 * Creates a new Strings object with the same string.
 *
 * @return self Returns instance of The Strings class.
 */
public function copy(): self
```

##### Example

```php
$strings1 = Strings::create('SG-1 returns from an off-world mission to P9Y-3C3');
$strings2 = $strings1->copy();
```

##### <a name="strings_length"></a> Method: `length()`

```php
/**
 * Return the length of the given string.
 */
public function length(): int
```

##### Example

```php
$length = Strings::create('SG-1 returns from an off-world mission to P9Y-3C3')->length();
```

##### <a name="strings_count"></a> Method: `count()`

```php
/**
 * Returns the length of the string, analog to length().
 */
public function count(): int
```

##### Example

```php
$count = Strings::create('SG-1 returns from an off-world mission to P9Y-3C3')->count();
```

##### <a name="strings_wordsCount"></a> Method: `wordsCount()`

```php
/**
 * Get words count from the string.
 *
 * @param string $ignore Ingnore symbols.
 */
public function wordsCount(string $ignore = '?!;:,.'): int
```

##### Example

```php
// Returns the number of words found
$result = Strings::create('SG-1 returns from an off-world mission')->wordsCount();
```

##### <a name="strings_countSubString"></a> Method: `countSubString()`

```php
/**
 * Returns the number of occurrences of $substring in the given string.
 * By default, the comparison is case-sensitive, but can be made insensitive
 * by setting $caseSensitive to false.
 *
 * @param  string $substring      The substring to search for
 * @param  bool   $caseSensitive Whether or not to enforce case-sensitivity
 */
public function countSubString(string $substring, bool $caseSensitive = true): int
```

##### Example

```php
// Returns the number of occurrences of $substring in the given string.
$result = Strings::create('Test string here for test')->countSubString('test');

// Returns the number of occurrences of $substring in the given string with $caseSensitive false.
$result = Strings::create('Test string here for test')->countSubString('test', false);

```

##### <a name="strings_lower"></a> Method: `lower()`

```php
/**
 * Convert the given string to lower-case.
 */
public function lower(): self
```

##### Example

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

##### Example

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

##### Example

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

##### Example

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

##### Example

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

##### Example

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

##### Example

```php
$string = Strings::create('fooBar')->kebab();
```


##### <a name="strings_lines"></a> Method: `lines()`

```php
/**
 * Get array of individual lines in the string.
 */
public function lines(): array
```

##### Example

```php
$lines = Strings::create("Fòô òô\n fòô fò fò \nfò\r")->lines();
```


##### <a name="strings_words"></a> Method: `words()`

```php
/**
 * Get words from the string.
 *
 * @param string $ignore Ingnore symbols.
 */
public function words(string $ignore = '?!;:,.'): array
```

##### Example

```php
$words = Strings::create('SG-1 returns from an off-world mission to P9Y-3C3')->words();
```

##### <a name="strings_wordsLimit"></a> Method: `wordsLimit()`

```php
/**
 * Limit the number of words in a string.
 *
 * @param  int    $words  Words limit
 * @param  string $append Text to append to the string IF it gets truncated
 */
public function wordsLimit(int $words = 100, string $append = '...'): self
```

##### Example

```php
// Get the number of words in a string with predefined limit settings
$string = Strings::create('SG-1 returns from an off-world mission to P9Y-3C3')->wordsLimit();

// Get the number of words in a string with limit 3
$string = Strings::create('SG-1 returns from an off-world mission to P9Y-3C3')->wordsLimit(3);

// Get the number of words in a string with limit 3 and append 'read more...'
$string = Strings::create('SG-1 returns from an off-world mission to P9Y-3C3')->wordsLimit(3, 'read more...');
```

##### <a name="strings_wordsFrequency"></a> Method: `wordsFrequency()`

```php
/**
 * Get words usage frequency array.
 *
 * @param int    $decimals     Number of decimal points. Default is 2.
 * @param string $decPoint     Separator for the decimal point. Default is ".".
 * @param string $thousandsSep Thousands separator. Default is ",".
 */
public function wordsFrequency(int $decimals = 2 , string $decPoint = "." , string $thousandsSep = ","): array
```

##### Example

```php
// Get words usage frequency array.
$result = Strings::create('car fòô bàřs apple')->wordsFrequency();

// Get words usage frequency array and set number of decimal points.
$result = Strings::create('car fòô bàřs apple')->wordsFrequency(4);

// Get words usage frequency array, set number of decimal points, set separator for the decimal point.
$result = Strings::create('car fòô bàřs apple')->wordsFrequency(4, '.');

// Get words usage frequency array, set number of decimal points, set separator for the decimal point, thousands separator.
$result = Strings::create('car fòô bàřs apple')->wordsFrequency(4, '.', ',');
```

##### <a name="strings_charsFrequency"></a> Method: `charsFrequency()`

```php
/**
 * Get chars usage frequency array.
 *
 * @param int    $decimals     Number of decimal points. Default is 2.
 * @param string $decPoint     Separator for the decimal point. Default is ".".
 * @param string $thousandsSep Thousands separator. Default is ",".
 */
public function charsFrequency(int $decimals = 2 , string $decPoint = "." , string $thousandsSep = ","): array
```

##### Example

```php
// Get chars usage frequency array.
$result = Strings::create('car fòô bàřs apple')->charsFrequency();

// Get chars usage frequency array and set number of decimal points.
$result = Strings::create('car fòô bàřs apple')->charsFrequency(4);

// Get chars usage frequency array, set number of decimal points, set separator for the decimal point.
$result = Strings::create('car fòô bàřs apple')->charsFrequency(4, '.');

// Get chars usage frequency array, set number of decimal points, set separator for the decimal point, thousands separator.
$result = Strings::create('car fòô bàřs apple')->charsFrequency(4, '.', ',');
```

##### <a name="strings_contains"></a> Method: `contains()`

```php
/**
 * Determine if a given string contains a given substring.
 *
 * @param  string|string[] $needles        The string to find in haystack.
 * @param  bool            $caseSensitive Whether or not to enforce case-sensitivity. Default is true.
 */
public function contains($needles, bool $caseSensitive = true): bool
```

##### Example

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
 * @param  string[] $needles        The array of strings to find in haystack.
 * @param  bool     $caseSensitive Whether or not to enforce case-sensitivity. Default is true.
 */
public function containsAll(array $needles, bool $caseSensitive = true): bool
```

##### Example

```php
$result = Strings::create('SG-1 returns from an off-world mission to P9Y-3C3')->containsAll(['SG-1', 'P9Y-3C3']);
```

##### <a name="strings_containsAny"></a> Method: `containsAny()`

```php
/**
 * Determine if a given string contains any of array values.
 *
 * @param  string   $haystack       The string being checked.
 * @param  string[] $needles        The array of strings to find in haystack.
 * @param  bool     $caseSensitive Whether or not to enforce case-sensitivity. Default is true.
 */
public function containsAny(array $needles, bool $caseSensitive = true): bool
```

##### Example

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

##### Example

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

##### Example

```php
$string = Strings::create('daniel')->ucfirst();
```

##### <a name="strings_trim"></a> Method: `trim()`

```php
/**
 * Strip whitespace (or other characters) from the beginning and end of a string.
 *
 * @param string $character_mask Stripped characters can also be specified using the character_mask parameter.
 */
public function trim(string $character_mask = null): self
```

##### Example

```php
$string = Strings::create(' daniel ')->trim();
```

##### <a name="strings_trimRight"></a> Method: `trimRight()`

```php
/**
 * Strip whitespace (or other characters) from the end of a string.
 *
 * @param string $character_mask Stripped characters can also be specified using the character_mask parameter.
 */
public function trimRight(string $character_mask = null): self
```

##### Example

```php
$string = Strings::create('daniel ')->trimRight();
```

##### <a name="strings_trimLeft"></a> Method: `trimLeft()`

```php
/**
 * Strip whitespace (or other characters) from the beginning of a string.
 *
 * @param string $character_mask Stripped characters can also be specified using the character_mask parameter.
 */
public function trimLeft(string $character_mask = null): self
```

##### Example

```php
$string = Strings::create(' daniel')->trimLeft();
```

##### <a name="strings_trimSlashes"></a> Method: `trimSlashes()`

```php
/**
 * Removes any leading and traling slashes from a string.
 */
public function trimSlashes(): self
```

##### Example

```php
$string = Strings::create('some string here/')->trimSlashes();
```

##### <a name="strings_capitalize"></a> Method: `capitalize()`

```php
/**
 * Converts the first character of every word of string to upper case and the others to lower case.
 */
public function capitalize(): self
```

##### Example

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

##### Example

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

##### Example

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

##### Example

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

##### Example

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

##### Example

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

##### Example

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

##### Example

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

##### Example

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

##### Example

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

##### Example

```php
$string = Strings::create('SG-1 returns from an off-world mission')->afterLast('SG-1');
```


##### <a name="strings_pipe"></a> Method: `pipe()`

```php
/**
 * Passes the strings to the given callback and return the result.
 *
 * @param Closure $callback Function with strings as parameter which returns arbitrary result.
 *
 * @return mixed Result returned by the callback.
 */
public function pipe(Closure $callback)
```

##### Example

```php
$string = Strings::create('Fòô');

$string->pipe(static function ($string) {
    $word = ' bàřs';
    return $strings->append($word);
});
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

##### Example

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

##### Example

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
##### Example

```php
$string = Strings::create('SG-1 returns from an off-world mission')->padLeft(50, '-');
```

##### <a name="strings_replacePunctuations"></a> Method: `replacePunctuations()`

```php
/**
 * Replace all punctuations characters in the string with the given value.
 *
 * @param string  $replacement Value to replace none alphanumeric characters with replacement. Default is ''
 * @param bool    $strict      Should spaces be preserved or not. Default is false.
 */
public function replacePunctuations(string $replacement = '', bool $strict = false): self
```

##### Example

```php
// Replace all punctuations characters in the string
$string = Strings::create('Fòô. bàřs, bàřs')->replacePunctuations();

// Replace all punctuations characters in the string with -
$string = Strings::create('Fòô. bàřs, bàřs')->replacePunctuations('-');

// Replace all punctuations characters in the string with - and and replace all spaces.
$string = Strings::create('Fòô. bàřs, bàřs')->replacePunctuations('-', true);
```

##### <a name="strings_replaceDashes"></a> Method: `replaceDashes()`

```php
/**
 * Replace all dashes characters in the string with the given value.
 *
 * @param string  $replacement Value to replace dashes characters with replacement. Default is ''
 * @param bool    $strict      Should spaces be preserved or not. Default is false.
 */
public function replaceDashes(string $replacement = '', bool $strict = false): self
```

##### Example

```php
// Replace all dashes characters in the string
$string = Strings::create('Fòôbàřs - Fòô - bàřs')->replaceDashes()->toString();

// Replace all dashes characters in the string with _
$string = Strings::create('Fòôbàřs-Fòô-bàřs')->replaceDashes('_')->toString();

// Replace all dashes characters in the string with _ and and replace all spaces.
$string = Strings::create('Fòôbàřs-Fòô-bàřs')->replaceDashes('_', true)->toString();
```

##### <a name="strings_replaceNonAlphanumeric"></a> Method: `replaceNonAlphanumeric()`

```php
/**
 * Replace none alphanumeric characters in the string with the given value.
 *
 * @param string $replacement Value to replace none alphanumeric characters with. Default is ''
 */
public function replaceNonAlphanumeric(string $replacement = ''): self
```

##### Example

```php
// Replace symbols -
$string = Strings::create('Fòô-bàřs-123')->replaceNonAlphanumeric();

// Replace symbols - with _
$string = Strings::create('Fòô-bàřs-123')->replaceNonAlphanumeric('_');

// Replace symbols - with _ and replace all spaces.
$string = Strings::create('Fòô-bàřs-123')->replaceNonAlphanumeric('_', true);
```

##### <a name="strings_replaceNonAlpha"></a> Method: `replaceNonAlpha()`

```php
/**
 * Replace none alpha characters in the string with the given value.
 *
 * @param string $replacement Value to replace none alpha characters with
 * @param bool   $strict      Should spaces be preserved or not. Default is false.
 */
public function replaceNonAlpha(string $replacement = '', bool $strict = false): self
```

##### Example

```php
// Replace none alpha characters in the string
$string = Strings::create('Fòô-bàřs-123')->replaceNonAlpha();

// Replace none alpha characters in the string with _
$string = Strings::create('Fòô-bàřs-123')->replaceNonAlpha('_');

// Replace none alpha characters in the string with _ and replace all spaces.
$string = Strings::create('Fòô-bàřs-123')->replaceNonAlpha('_', true);
```

##### <a name="strings_replace"></a> Method: `replace()`

```php
/**
 * Replace the given value in the given string.
 *
 * @param  string                     $search  Search
 * @param  array<int|string, string>  $replace Replace
 */
public function replace(string $search, $replace): self
```

##### Example

```php
$string = Strings::create('SG-1 returns from an off-world mission')->replace('SG-1', 'SG-2');
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

##### Example

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

##### Example

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

##### Example

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

##### Example

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

##### Example

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

##### Example

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

##### Example

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

##### Example

```php
// Get string hash with predefined settings
$result = Strings::create('SG-1 returns from an off-world mission')->hash();

// Get string hash with hashed with sha256 algorithm
$result = Strings::create('SG-1 returns from an off-world mission')->hash('sha256');

// Get string hash with hashed with sha256 algorithm and with raw output
$result = Strings::create('SG-1 returns from an off-world mission')->hash('sha256', true);
```

##### <a name="strings_prepend"></a> Method: `prepend()`

```php
/**
 * Prepend the given values to the string.
 *
 * @param  string[] $values
 */
public function prepend(string ...$values): self
```

##### Example

```php
$string = Strings::create('PLAY HARD.')->prepend('WORK HARD. ');
```

##### <a name="strings_append"></a> Method: `append()`

```php
/**
 * Append the given values to the string.
 *
 * @param  string[] $values
 */
public function append(string ...$values): self
```

##### <a name="strings_getIterator"></a> Method: `getIterator()`

```php
/**
 * Create a new iterator from an ArrayObject instance
 */
public function getIterator(): ArrayIterator
```

##### Example

```php
$iterator = Strings::create('foo')->getIterator();
```

##### Example

```php
$string = Strings::create('WORK HARD.')->append(' PLAY HARD.');
```

##### <a name="strings_shuffle"></a> Method: `shuffle()`

```php
/**
 * Randomly shuffles a string.
 */
public function shuffle(): self
```

##### Example

```php
$string = Strings::create('hello')->shuffle();
```

##### <a name="strings_similarity"></a> Method: `similarity()`

```php
/**
 * Calculate the similarity between two strings.
 *
 * @param string $string The delimiting string.
 */
public function similarity(string $string): float
```

##### Example

```php
$percent = Strings::create('hello')->similarity('hello');
```

##### <a name="strings_at"></a> Method: `at()`

```php
/**
* Returns the character at $index, with indexes starting at 0.
*
* @param int $index Position of the character
*/
public function at(int $index): self
```

##### Example

```php
$character = Strings::create('hello')->at(3);
```

##### <a name="strings_indexOf"></a> Method: `indexOf()`

```php
/**
 * Returns the index of the first occurrence of $needle in the string,
 * and false if not found. Accepts an optional offset from which to begin
 * the search.
 *
 * @param int|string $needle         The string to find in haystack.
 * @param int        $offset         The search offset. If it is not specified, 0 is used.
 * @param bool       $caseSensitive Whether or not to enforce case-sensitivity. Default is true.
 */
public function indexOf($needle, int $offset = 0, bool $caseSensitive = true)
```

##### Example

```php
$index = Strings::create('hello')->indexOf('e');
```

##### <a name="strings_indexOfLast"></a> Method: `indexOfLast()`

```php
/**
 * Returns the index of the last occurrence of $needle in the string, and false if not found.
 * Accepts an optional $offset from which to begin the search. Offsets may be negative to
 * count from the last character in the string.
 *
 * @param int|string $needle         The string to find in haystack.
 * @param int        $offset         The search offset. If it is not specified, 0 is used.
 * @param bool       $caseSensitive Whether or not to enforce case-sensitivity. Default is true.
 */
public function indexOfLast(string $needle, int $offset = 0, bool $caseSensitive = true)
```

##### Example

```php
$index = Strings::create('hello')->indexOfLast('l');
```

##### <a name="strings_move"></a> Method: `move()`

```php
/**
 * Move substring of desired $length to $destination index of the original string.
 * In case $destination is less than $length returns the string untouched.
 *
 * @param int $start       Start
 * @param int $length      Length
 * @param int $destination Destination
 */
public function move(int $start, int $length, int $destination): self
```

##### Example

```php
$string = Strings::create('hello world')->move(0, 5, 10);
```

##### <a name="strings_insert"></a> Method: `insert()`

```php
/**
 * Inserts $substring into the string at the $index provided.
 *
 * @param string $substring Substring
 * @param int    $index     Index
 */
public function insert(string $substring, int $index): self
```

##### Example

```php
$string = Strings::create('world')->insert('hello ');
$string = Strings::create('hello')->insert(' world', 5);
```

##### <a name="strings_toString"></a> Method: `toString()`

```php
/**
 * Return Strings object as string.
 */
public function toString(): string
```

##### Example

```php
$string = Strings::create('hello world')->toString();
```

##### <a name="strings_toInteger"></a> Method: `toInteger()`

```php
/**
 * Return Strings object as integer.
 */
public function toInteger(): int
```

##### Example

```php
$integer = Strings::create('42')->toInteger();
```

##### <a name="strings_toFloat"></a> Method: `toFloat()`

```php
/**
 * Return Strings object as float.
 */
public function toFloat(): float
```

##### Example

```php
$float = Strings::create('42.0')->toFloat();
```

##### <a name="strings_toBoolean"></a> Method: `toBoolean()`

```php
/**
 * Returns a boolean representation of the given logical string value.
 *
 * For example:
 * 'true', '1', 'on' and 'yes' will return true.
 * 'false', '0', 'off', and 'no' will return false.
 *
 * In all instances, case is ignored.
 *
 * For other numeric strings, their sign will determine the return value.
 * In addition, blank strings consisting of only whitespace will return
 * false. For all other strings, the return value is a result of a
 * boolean cast.
 */
public function toBoolean(): bool
```

##### Example

```php
$state = Strings::create('on')->toBoolean();
$state = Strings::create('off')->toBoolean();
```

##### <a name="strings_toArray"></a> Method: `toArray()`

```php
/**
 * Return Strings object as array based on a delimiter.
 *
 * @param string $delimiter Delimeter. Default is null.
 */
public function toArray(string $delimiter = null): array
```

##### Example

```php
$array = Strings::create('hello world')->toArray();
$array = Strings::create('hello, world')->toArray(',');
```

##### <a name="strings_isEmpty"></a> Method: `isEmpty()`

```php
/**
 * Returns true if the string is not empty, false otherwise.
 */
public function isEmpty(): bool
```

##### Example

```php
if (Strings::create()->isEmpty()) {
    // do something...
}
```

##### <a name="strings_isAscii"></a> Method: `isAscii()`

```php
/**
 * Returns true if the string contains ASCII, false otherwise.
 */
public function isAscii(): bool
```

##### Example

```php
if (Strings::create('#@$%')->isAscii()) {
    // do something...
}
```

##### <a name="strings_isAlphanumeric"></a> Method: `isAlphanumeric()`

```php
/**
 * Returns true if the string contains only alphabetic and numeric chars, false otherwise.
 */
public function isAlphanumeric(): bool
```

##### Example

```php
if (Strings::create('fòôbàřs12345')->isAlphanumeric()) {
    // do something...
}
```

##### <a name="strings_isAlpha"></a> Method: `isAlpha()`

```php
/**
 * Returns true if the string contains only alphabetic chars, false otherwise.
 */
public function isAlpha(): bool
```

##### Example

```php
if (Strings::create('fòôbàřs')->isAlpha()) {
    // do something...
}
```

##### <a name="strings_isBlank"></a> Method: `isBlank()`

```php
/**
 * Returns true if the string contains only whitespace chars, false otherwise.
 */
public function isBlank(): bool
```

##### Example

```php
if (Strings::create()->isBlank()) {
    // do something...
}
```

##### <a name="strings_isNumeric"></a> Method: `isNumeric()`

```php
/**
 * Returns true if the string is a number or a numeric strings, false otherwise.
 */
public function isNumeric(): bool
```

##### Example

```php
if (Strings::create('42')->isNumeric()) {
    // do something...
}
```

##### <a name="strings_isDigit"></a> Method: `isDigit()`

```php
/**
 * Returns true if the string contains only digit chars, false otherwise.
 */
public function isDigit(): bool
```

##### Example

```php
if (Strings::create('01234569')->isDigit()) {
    // do something...
}
```

##### <a name="strings_isLower"></a> Method: `isLower()`

```php
/**
 * Returns true if the string contains only lower case chars, false otherwise.
 */
public function isLower(): bool
```

##### Example

```php
if (Strings::create('fòôbàřs')->isLower()) {
    // do something...
}
```

##### <a name="strings_isUpper"></a> Method: `isUpper()`

```php
/**
 * Returns true if the string contains only upper case chars, false otherwise.
 */
public function isUpper(): bool
```

##### Example

```php
if (Strings::create('FOOBAR')->isUpper()) {
    // do something...
}
```

##### <a name="strings_isEmail"></a> Method: `isEmail()`

```php
/**
 * Returns true if the string is email and it is valid, false otherwise.
 */
public function isEmail(): bool
```

##### Example

```php
if (Strings::create('awilum@atomastic.com')->isEmail()) {
    // do something...
}
```

##### <a name="strings_isUrl"></a> Method: `isUrl()`

```php
/**
* Returns true if the string is url and it is valid, false otherwise.
*/
public function isUrl(): bool
```

##### Example

```php
if (Strings::create('http://atomastic.com')->isUrl()) {
    // do something...
}
```

##### <a name="strings_isHexadecimal"></a> Method: `isHexadecimal()`

```php
/**
 * Returns true if the string contains only hexadecimal chars, false otherwise.
 */
public function isHexadecimal(): bool
```

##### Example

```php
if (Strings::create('19FDE')->isHexadecimal()) {
    // do something...
}
```

##### <a name="strings_isPrintable"></a> Method: `isPrintable()`

```php
/**
 * Returns true if the string contains only printable (non-invisible) chars, false otherwise.
 */
public function isPrintable(): bool
```

##### Example

```php
if (Strings::create('LKA#@%.54')->isPrintable()) {
    // do something...
}
```

##### <a name="strings_isPunctuation"></a> Method: `isPunctuation()`

```php
/**
 * Returns true if the string contains only punctuation chars, false otherwise.
 */
public function isPunctuation(): bool
```

##### Example

```php
if (Strings::create(',')->isPunctuation()) {
    // do something...
}
```

##### <a name="strings_isSerialized"></a> Method: `isSerialized()`

```php
/**
 * Returns true if the string is serialized, false otherwise.
 */
public function isSerialized(): bool
```

##### Example

```php
if (Strings::create('s:11:"fòôbàřs";'))->isSerialized()) {
    // do something...
}
```

##### <a name="strings_isJson"></a> Method: `isJson()`

```php
/**
 * Returns true if the string is JSON, false otherwise.
 */
public function isJson(): bool
```

##### Example

```php
if (Strings::create('{"yaml": "json"}'))->isJson()) {
    // do something...
}
```

##### <a name="strings_isBase64"></a> Method: `isBase64()`

```php
/**
 * Returns true if the string is base64 encoded, false otherwise.
 */
public function isBase64(): bool
```

##### Example

```php
if (Strings::create('ZsOyw7Riw6DFmXM='))->isBase64()) {
    // do something...
}
```

##### <a name="strings_isSimilar"></a> Method: `isSimilar()`

```php
/**
 * Check if two strings are similar.
 *
 * @param string $string                  The string to compare against.
 * @param float  $minPercentForSimilarity The percentage of needed similarity. Default is 80%
 *
 * @return bool
 */
public function isSimilar(string $string, float $minPercentForSimilarity = 80.0): bool
```

##### Example

```php
if (Strings::create('fòôbàřs')->isSimilar('fòôbàřs')) {
    // do something...
}

if (Strings::create('fòôbàřs')->isSimilar('fòô', 50.0)) {
    // do something...
}
```

##### <a name="strings_isEqual"></a> Method: `isEqual()`

```php
/**
 * Determine whether the string is equals to $string.
 *
 * @param $string String to compare.
 */
public function isEqual(string $string): bool
```

##### Example

```php
if (Strings::create('fòôbàřs')->isEqual('fòôbàřs')) {
    // do something...
}
```

##### <a name="strings_isIP"></a> Method: `isIP()`

```php
/**
 * Determine whether the string is IP and it is a valid IP address.
 *
 * @param $flags Flags:
 *                  FILTER_FLAG_IPV4
 *                  FILTER_FLAG_IPV6
 *                  FILTER_FLAG_NO_PRIV_RANGE
 *                  FILTER_FLAG_NO_RES_RANGE
 */
public function isIP(int $flags = FILTER_FLAG_IPV4 | FILTER_FLAG_IPV6): bool
```

##### Example

```php
if (Strings::create('127.0.0.1')->isIP()) {
    // do something...
}
```

##### <a name="strings_isMAC"></a> Method: `isMAC()`

```php
/**
 * Determine whether the string is MAC address and it is a valid MAC address.
 */
public function isMAC(): bool
```

##### Example

```php
if (Strings::create('00:11:22:33:44:55')->isMAC()) {
    // do something...
}
```

##### <a name="strings_isHTML"></a> Method: `isHTML()`

```php
/**
 * Determine whether the string is HTML.
 */
public function isHTML(): bool
```

##### Example

```php
if (Strings::create('<b>fòôbàřs</b>')->isHTML()) {
    // do something...
}
```

##### <a name="strings_isBoolean"></a> Method: `isBoolean()`

```php
/**
 * Determine whether the string is Boolean.
 *
 * Boolean representation for logical strings:
 * 'true', '1', 'on' and 'yes' will return true.
 * 'false', '0', 'off', and 'no' will return false.
 *
 * In all instances, case is ignored.
 */
public function isBoolean(): bool
```

##### Example

```php
if (Strings::create('on')->isBoolean()) {
    // do something...
}

if (Strings::create('off')->isBoolean()) {
    // do something...
}
```

##### <a name="strings_isTrue"></a> Method: `isTrue()`

```php
/**
 * Determine whether the string is Boolean and it is TRUE.
 */
public function isTrue(): bool
```

##### Example

```php
if (Strings::create('on')->isBoolean()) {
    // do something...
}
```

##### <a name="strings_isFalse"></a> Method: `isFalse()`

```php
/**
 * Determine whether the string is Boolean and it is FALSE.
 */
public function isFalse(): bool
```

##### Example

```php
if (Strings::create('off')->isBoolean()) {
    // do something...
}
```

##### <a name="strings_offsetGet"></a> Method: `offsetGet()`

```php
/**
 * Returns the character at the given index. Offsets may be negative to
 * count from the last character in the string. Implements part of the
 * ArrayAccess interface, and throws an OutOfBoundsException if the index
 * does not exist.
 *
 * @param  mixed $offset         The index from which to retrieve the char
 *
 * @return mixed                 The character at the specified index
 * @throws OutOfBoundsException  If the positive or negative offset does
 *                               not exist
 *
 * @return bool Return TRUE key exists in the array, FALSE otherwise.
 */
public function offsetGet($offset)
```

##### Example

```php
$strings = Strings::create('fòô');

echo $strings[0];
echo $strings[1];
echo $strings[2];
echo $strings->offsetGet(0);
echo $strings->offsetGet(1);
echo $strings->offsetGet(2);
```

##### <a name="strings_offsetSet"></a> Method: `offsetSet()`

```php
/**
 * Implements part of the ArrayAccess interface, but throws an exception
 * when called. This maintains the immutability of Strings objects.
 *
 * @param  mixed      $offset The index of the character
 * @param  mixed      $value  Value to set
 *
 * @throws Exception When called
 */
public function offsetSet($offset, $value)
```

##### Example

```php
$strings = Strings::create('fòô');
$strings->offsetSet(3, 'foo');

// Will throws an exception!
```

##### <a name="strings_offsetUnset"></a> Method: `offsetUnset()`

```php
/**
 * Implements part of the ArrayAccess interface, but throws an exception
 * when called. This maintains the immutability of Strings objects.
 *
 * @param  mixed      $offset The index of the character
 *
 * @throws Exception When called
 */
public function offsetUnset($offset)
```

##### Example

```php
$strings = Strings::create('fòô');
$strings->offsetUnset(3);

// Will throws an exception!
```


##### <a name="strings_offsetExists"></a> Method: `offsetExists()`

```php
/**
 * Returns whether or not a character exists at an index. Offsets may be
 * negative to count from the last character in the string. Implements
 * part of the ArrayAccess interface.
 *
 * @param  mixed   $offset The index to check
 *
 * @return bool Return TRUE key exists in the array, FALSE otherwise.
 */
public function offsetExists($offset)
```

##### Example

```php
$strings = Strings::create('fòô');

if (isset($strings[2]) && $strings[2] == 'ô') {
    // do something...
}

if ($strings->offsetExists(2) && $strings->offsetGet(2) == 'ô') {
    // do something...
}
```

##### <a name="strings_wordsSortAsc"></a> Method: `wordsSortAsc()`

```php
/**
 * Sort words in string ascending.
 */
public function wordsSortAsc(): self
```

##### Example

```php
$string = Strings::create('car fòô bàřs apple')->wordsSortAsc();
```


##### <a name="strings_wordsSortDesc"></a> Method: `wordsSortDesc()`

```php
/**
 * Sort words in string descending.
 */
public function wordsSortDesc(): self
```

##### Example

```php
$string = Strings::create('car fòô bàřs apple')->wordsSortDesc();
```


### Tests

Run tests

```
./vendor/bin/pest
```

### License
[The MIT License (MIT)](https://github.com/atomastic/strings/blob/master/LICENSE)
Copyright (c) 2020 [Sergey Romanenko](https://github.com/Awilum)
