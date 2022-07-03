<a name="5.0.1"></a>
# [5.0.1](https://github.com/glowyphp/strings) (2022-07-03)
* Dependencies fixes.

<a name="5.0.0"></a>
# [5.0.0](https://github.com/glowyphp/strings) (2022-07-03)
* All Helpers functions are placed into the Glowy/Strings namespace.
* Use union types.
* Moving to PHP 8.1

<a name="4.4.0"></a>
# [4.4.0](https://github.com/glowyphp/strings) (2022-07-02)
* Added is() method.
* Added isNot() method.
* Added isNotHexColor() method.
* Added isNotAffirmative() method.
* Added isNotDate() method.
* Added isNotEmail() method.
* Added isNotUrl() method.
* Added isNotEmpty() method.
* Added isNotAscii() method.
* Added isNotAlphanumeric() method.
* Added isNotAlpha() method.
* Added isNotBlank() method.
* Added isNotNumeric() method.
* Added isNotDigit() method.
* Added isNotLower() method.
* Added isNotUpper() method.
* Added isNotHexadecimal() method.
* Added isNotPrintable() method.
* Added isNotPunctuation() method.
* Added isNotSerialized() method.
* Added isNotJson() method.
* Added isNotBase64() method.
* Added isNotSimilar() method.
* Added isNotEqual() method.
* Added isNotIP() method.
* Added isNotMAC() method.
* Added isNotHTML() method.
* Added isNotInteger() method.
* Added isNotFloat() method.
* Added isNotNull() method.
* Added isNotBoolean() method.
* Added isNotTrue() method.
* Added isNotFalse() method.
* Added isNotUuid() method.
* Added when() method.
* Added unless() method.
* Added whenContains() method.
* Added whenEqual() method.
* Added whenIs() method.
* Added whenIsAscii() method.
* Added whenStartsWith() method.
* Added whenIsUuid() method.
* Added wrap() method.
* Added dump() method.
* Added dd() method.
* Added newLine() method.

<a name="4.3.1"></a>
# [4.3.1](https://github.com/glowyphp/strings) (2022-05-08)
* Fix toNull() method.

<a name="4.3.0"></a>
# [4.3.0](https://github.com/glowyphp/strings) (2022-05-08)
* Added isNull() method.
* Added isInteger() method.
* Added isFloat() method.
* Added isUuid() method.
* Added toNull() method.
* Method pipe() returns a new instance of the class.

<a name="4.2.0"></a>
# [4.2.0](https://github.com/glowyphp/strings) (2022-01-01)
* Added isHexColor() method.
* Added isAffirmative() method.
* Added isDate() method.

<a name="4.1.0"></a>
# [4.1.0](https://github.com/glowyphp/strings) (2021-12-30)
* Added headline() method.
* Added replaceSubstr() method.
* Added mask() method.
* Added sponge() method.
* Added swap() method.

<a name="4.0.0"></a>
# [4.0.0](https://github.com/glowyphp/strings) (2021-12-22)
* Released under Glowy PHP Organization
* Added PHP 8.1 support
* Updated dependencies.

<a name="3.0.2"></a>
# [3.0.2](https://github.com/glowyphp/strings) (2021-04-13)
* Fixed snake() method

<a name="3.0.1"></a>
# [3.0.1](https://github.com/glowyphp/strings) (2021-02-19)
* Fixed dependencies.

<a name="3.0.0"></a>
# [3.0.0](https://github.com/glowyphp/strings) (2021-02-18)
* Moving to PHP 7.4.0
* Added echo() method
* Added format() method
* Added crc32() method
* Added md5() method
* Added sha1() method
* Added sha256() method
* Added base64Decode() method
* Added base64Encode() method

<a name="2.5.0"></a>
# [2.5.0](https://github.com/glowyphp/strings) (2021-01-29)
* Fixed contains() method
* Improved before() method

<a name="2.4.0"></a>
# [2.4.0](https://github.com/glowyphp/strings) (2020-12-05)
* Added copy() method.
* Added ability to extend Strings class with Macros.

    ```php
    use Glowy\Strings\Strings;
    use Glowy\Macroable\Macroable;

    Strings::macro('concatenate', function(string $string) {
        return $this->toString() . $string;
    });

    $strings = new Strings('Hello');

    echo $strings->concatenate(' World'));
    ```

<a name="2.3.0"></a>
# [2.3.0](https://github.com/glowyphp/strings) (2020-11-30)
* Added replace() method.
* Added pipe() method.
* Added chars() method.
* Added getIterator() method.
* Added offsetExists() offsetGet() offsetSet() offsetExists() methods.
* implement interface: ArrayAccess, Countable, IteratorAggregate.
* Improved methods trim() trimLeft() trimRight()
* Improved tests for replaceArray() method.
* Improved tests workflow
* general code refactoring

<a name="2.2.0"></a>
# [2.2.0](https://github.com/glowyphp/strings) (2020-11-24)
* Fixed limit() method if string length is lower or equals to provided limit.
* Fixed studly() method.
* Fixed issue with encoding on new Strings object creation.
* Removed memory cache for words.
* Added tests for isSimilar() method.
* Improved tests for isBase64() method.
* Improved tests for move() method.
* Improved tests for beforeLast() method.
* Improved tests for afterLast() method.
* Improved tests for replaceFirst() method.
* Improved tests for between() method.
* Improved tests for indexOfLast() method.
* Improved tests for indexOf() method.
* Improved tests for random() method.
* Improved tests for replaceLast() method.
* Improved tests for isSerialized() method.
* Improved tests for hash() method.
* Improved tests for studly() method.
* Improved tests for __costruct() method.
* Improved tests workflow.

<a name="2.1.0"></a>
# [2.1.0](https://github.com/glowyphp/strings) (2020-11-05)
* Added isIP method.
* Added isMAC method.
* Added isHTML method.
* Added isBoolean method.
* Added isTrue method.
* Added isFalse method.
* Improved tests for toBoolean method.

<a name="2.0.0"></a>
# [2.0.0](https://github.com/glowyphp/strings) (2020-10-28)

* simplify length() method.
* Added lines() method.
* Added words() method.
* Added charsFrequency() method.
* Added wordsFrequency() method.
* Added wordsSortDesc() and wordsSortAsc() methods.
* Added replaceDashes() method.
* Added replacePunctuations() method.
* Added getEncoding() and setEncoding() methods.
* Added replaceNonAlpha() method and update replaceNonAlphanumeric() method.
* Added replaceNonAlphanumeric() method.
* Added isUrl() method.
* Added isEmail() method.
* Improved stripSpaces() method.
* rewrite method logic and rename countWords() to wordsCount()
* rename method words() to wordsLimit() and Improved tests for this method.
* update tests for segments() method.

### BREAKING CHANGES

* USE METHOD wordsCount() INSTEAD OF countWords()
* USE wordsLimit() INSTEAD OF words()

<a name="1.0.0"></a>
# [1.0.0](https://github.com/glowyphp/strings) (2020-09-25)
* Initial release
