<a name="2.4.0"></a>
# [2.4.0](https://github.com/atomastic/strings) (2020-12-05)
* add copy() method.
* add ability to extend Strings class with Macros.

    ```php
    use Atomastic\Strings\Strings;
    use Atomastic\Macroable\Macroable;

    Strings::macro('concatenate', function(string $string) {
        return $this->toString() . $string;
    });

    $strings = new Strings('Hello');

    echo $strings->concatenate(' World'));
    ```

<a name="2.3.0"></a>
# [2.3.0](https://github.com/atomastic/strings) (2020-11-30)
* add replace() method.
* add pipe() method.
* add chars() method.
* add getIterator() method.
* add offsetExists() offsetGet() offsetSet() offsetExists() methods.
* implement interface: ArrayAccess, Countable, IteratorAggregate.
* improve methods trim() trimLeft() trimRight()
* improve tests for replaceArray() method.
* improve tests workflow
* general code refactoring

<a name="2.2.0"></a>
# [2.2.0](https://github.com/atomastic/strings) (2020-11-24)
* fix limit() method if string length is lower or equals to provided limit.
* fix studly() method.
* fix issue with encoding on new Strings object creation.
* remove memory cache for words.
* add tests for isSimilar() method.
* improve tests for isBase64() method.
* improve tests for move() method.
* improve tests for beforeLast() method.
* improve tests for afterLast() method.
* improve tests for replaceFirst() method.
* improve tests for between() method.
* improve tests for indexOfLast() method.
* improve tests for indexOf() method.
* improve tests for random() method.
* improve tests for replaceLast() method.
* improve tests for isSerialized() method.
* improve tests for hash() method.
* improve tests for studly() method.
* improve tests for __costruct() method.
* improve tests workflow.

<a name="2.1.0"></a>
# [2.1.0](https://github.com/atomastic/strings) (2020-11-05)
* add isIP method.
* add isMAC method.
* add isHTML method.
* add isBoolean method.
* add isTrue method.
* add isFalse method.
* improve tests for toBoolean method.

<a name="2.0.0"></a>
# [2.0.0](https://github.com/atomastic/strings) (2020-10-28)

* simplify length() method.
* add lines() method.
* add words() method.
* add charsFrequency() method.
* add wordsFrequency() method.
* add wordsSortDesc() and wordsSortAsc() methods.
* add replaceDashes() method.
* add replacePunctuations() method.
* add getEncoding() and setEncoding() methods.
* add replaceNonAlpha() method and update replaceNonAlphanumeric() method.
* add replaceNonAlphanumeric() method.
* add isUrl() method.
* add isEmail() method.
* improve stripSpaces() method.
* rewrite method logic and rename countWords() to wordsCount()
* rename method words() to wordsLimit() and improve tests for this method.
* update tests for segments() method.

### BREAKING CHANGES

* USE METHOD wordsCount() INSTEAD OF countWords()
* USE wordsLimit() INSTEAD OF words()

<a name="1.0.0"></a>
# [1.0.0](https://github.com/atomastic/strings) (2020-09-25)
* Initial release
