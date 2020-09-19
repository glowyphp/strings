<?php

declare(strict_types = 1);

use Atomastic\Strings\Strings;

test('test trimSlashes() method', function() {
    $this->assertEquals('some text here', Strings::of('some text here/')->trimSlashes());
});

test('test reduceSlashes() method', function() {
    $this->assertEquals('some/text/here', Strings::of('some//text//here')->reduceSlashes());
});

test('test stripQuotes() method', function() {
    $this->assertEquals('some text here', Strings::of('some "text" here')->stripQuotes());
    $this->assertEquals('some text here', Strings::of('some \'"text"\' here')->stripQuotes());
});

test('test quotesToEntities() method', function() {
    $this->assertEquals('&#39; &quot;', Strings::of('\' "')->quotesToEntities());
});

test('test normalizeNewLines() method', function() {
    $this->assertEquals("\n \n", Strings::of("\r\n \r")->normalizeNewLines());
});

test('test normalizeSpaces() method', function() {
    $this->assertEquals(' ', Strings::of('   ')->normalizeSpaces());
});

test('test random() method', function() {
    $this->assertNotEquals(Strings::of()->random(), Strings::of()->random());
    $this->assertNotEquals(Strings::of()->random(10), Strings::of()->random(10));
    $this->assertNotEquals(Strings::of()->random(10, '0123456789'), Strings::of()->random(10, '0123456789'));
    $this->assertEquals(10, Strings::of(Strings::of()->random(10, '0123456789'))->length());
});

test('test increment() method', function() {
    $this->assertEquals('page_2', Strings::of('page_1')->increment());
    $this->assertEquals('page_3', Strings::of('page')->increment(3));
    $this->assertEquals('page-3', Strings::of('page')->increment(3, '-'));
});


test('test limit() method', function() {
    $this->assertEquals('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore...',
                         Strings::of('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.')->limit());

    $this->assertEquals('Lorem...',
                         Strings::of('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.')->limit(5));

    $this->assertEquals('Lorem>>>',
                         Strings::of('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.')->limit(5, '>>>'));
});

test('test lower() method', function() {
    $this->assertEquals('daniel', Strings::of('DANIEL')->lower());
});

test('test upper() method', function() {
    $this->assertEquals('DANIEL', Strings::of('daniel')->upper());
});

test('test studly() method', function() {
    $this->assertEquals('FooBar', Strings::of('foo_bar')->studly());
});

test('test snake() method', function() {
    $this->assertEquals('foo_bar', Strings::of('fooBar')->snake());
    $this->assertEquals('foo__bar', Strings::of('fooBar')->snake('__'));
});

test('test camel() method', function() {
    $this->assertEquals('fooBar', Strings::of('foo_bar')->camel());
});

test('test kebab() method', function() {
    $this->assertEquals('foo-bar', Strings::of('fooBar')->kebab());
});

test('test words() method', function() {
    $this->assertEquals('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum....',
                         Strings::of('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.')->words());

    $this->assertEquals('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do...',
                         Strings::of('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.')->words(10));

    $this->assertEquals('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do>>>',
                         Strings::of('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.')->words(10, '>>>'));
});

test('test wordsCount() method', function() {
    $this->assertEquals(69,
                         Strings::of('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.')->wordsCount());
     $this->assertEquals(['Lorem', 'ipsum', 'dolor'],
                          Strings::of('Lorem ipsum dolor')->wordsCount(1));

     $this->assertEquals([0 => 'Lorem', 6 => 'ipsum', 12 => 'dolor'],
                          Strings::of('Lorem ipsum dolor')->wordsCount(2));
});

test('test contains() method', function() {
    $this->assertTrue(Strings::of('Lorem ipsum dolor')->contains('ipsum'));
    $this->assertFalse(Strings::of('Lorem ipsum dolor')->contains('test'));
    $this->assertTrue(Strings::of('Lorem ipsum dolor')->contains(['ipsum', 'dolor']));
    $this->assertFalse(Strings::of('Lorem ipsum dolor')->contains(['test1', 'test2']));
});

test('test containsAll() method', function() {
    $this->assertTrue(Strings::of('Lorem ipsum dolor')->containsAll(['ipsum', 'dolor']));
});

test('test containsAny() method', function() {
    $this->assertTrue(Strings::of('Lorem ipsum dolor')->containsAny(['ipsum', 'dolor']));
});

test('test ucfirst() method', function() {
    $this->assertEquals('Daniel', Strings::of('daniel')->ucfirst());
});

test('test capitalize() method', function() {
    $this->assertEquals('Daniel', Strings::of('daniel')->capitalize());
});

test('test length() method', function() {
    $this->assertEquals(4, Strings::of('SG-1')->length());
});

test('test substr() method', function() {
    $this->assertEquals('SG-1 returns from an off-world mission to P9Y-3C3', Strings::of('SG-1 returns from an off-world mission to P9Y-3C3')->substr(0));
    $this->assertEquals('SG-1', Strings::of('SG-1 returns from an off-world mission to P9Y-3C3')->substr(0, 4));
});

test('test trim() method', function() {
    $this->assertEquals('daniel', Strings::of(' daniel ')->trim());
});

test('test trimLeft() method', function() {
    $this->assertEquals('daniel', Strings::of(' daniel')->trimLeft());
});

test('test trimRight() method', function() {
    $this->assertEquals('daniel', Strings::of('daniel ')->trimRight());
});

test('test reverse() method', function() {
    $this->assertEquals('1-GS', Strings::of('SG-1')->reverse());
});

test('test segments() method', function() {
    $this->assertEquals(['SG-1', 'returns', 'from', 'an', 'off-world', 'mission'], Strings::of('SG-1 returns from an off-world mission')->segments());
    $this->assertEquals(['movies', 'sg-1', 'season-5', 'episode-21'], Strings::of('movies/sg-1/season-5/episode-21')->segments('/'));
});

test('test segment() method', function() {
    $this->assertEquals('SG-1', Strings::of('SG-1 returns from an off-world mission')->segment(0));
    $this->assertEquals('mission', Strings::of('SG-1 returns from an off-world mission')->segment(-1));
    $this->assertEquals('movies', Strings::of('movies/sg-1/season-5/episode-21')->segment(0, '/'));
    $this->assertEquals('episode-21', Strings::of('movies/sg-1/season-5/episode-21')->segment(-1, '/'));
});

test('test firstSegment() method', function() {
    $this->assertEquals('SG-1', Strings::of('SG-1 returns from an off-world mission')->firstSegment());
    $this->assertEquals('movies', Strings::of('movies/sg-1/season-5/episode-21')->firstSegment('/'));
});

test('test lastSegment() method', function() {
    $this->assertEquals('mission', Strings::of('SG-1 returns from an off-world mission')->lastSegment());
    $this->assertEquals('episode-21', Strings::of('movies/sg-1/season-5/episode-21')->lastSegment('/'));
});

test('test between() method', function() {
    $this->assertEquals(' returns ', Strings::of('SG-1 returns from an off-world mission')->between('SG-1', 'from'));
});

test('test before() method', function() {
    $this->assertEquals('SG-1 returns from an off-world ', Strings::of('SG-1 returns from an off-world mission')->before('mission'));
});

test('test beforeLast() method', function() {
    $this->assertEquals('SG-1 returns from an off-world ', Strings::of('SG-1 returns from an off-world mission')->beforeLast('mission'));
});

test('test after() method', function() {
    $this->assertEquals(' returns from an off-world mission', Strings::of('SG-1 returns from an off-world mission')->after('SG-1'));
});

test('test afterLast() method', function() {
    $this->assertEquals(' returns from an off-world mission', Strings::of('SG-1 returns from an off-world mission')->afterLast('SG-1'));
});

test('test stripSpaces() method', function() {
    $this->assertEquals('SG-1returnsfromanoff-worldmission', Strings::of('SG-1 returns from an off-world mission')->stripSpaces());
});

test('test padBoth() method', function() {
    $this->assertEquals('------SG-1 returns from an off-world mission------', Strings::of('SG-1 returns from an off-world mission')->padBoth(50, '-'));
});

test('test padRight() method', function() {
    $this->assertEquals('SG-1 returns from an off-world mission------------', Strings::of('SG-1 returns from an off-world mission')->padRight(50, '-'));
});

test('test padLeft() method', function() {
    $this->assertEquals('------------SG-1 returns from an off-world mission', Strings::of('SG-1 returns from an off-world mission')->padLeft(50, '-'));
});

test('test replaceArray() method', function() {
    $this->assertEquals('SG-2 returns from an off-world mission', Strings::of('SG-1 returns from an off-world mission')->replaceArray('SG-1', ['SG-2']));
});

test('test replaceFirst() method', function() {
    $this->assertEquals('SG-2 returns from an off-world mission', Strings::of('SG-1 returns from an off-world mission')->replaceFirst('SG-1', 'SG-2'));
});

test('test replaceLast() method', function() {
    $this->assertEquals('SG-1 returns from an P9Y-3C3 mission', Strings::of('SG-1 returns from an off-world mission')->replaceLast('off-world', 'P9Y-3C3'));
});

test('test start() method', function() {
    $this->assertEquals('/movies/sg-1/season-5/episode-21/', Strings::of('movies/sg-1/season-5/episode-21/')->start('/'));
});

test('test startsWith() method', function() {
    $this->assertTrue(Strings::of('/movies/sg-1/season-5/episode-21/')->startsWith('/'));
    $this->assertFalse(Strings::of('/movies/sg-1/season-5/episode-21/')->startsWith('//'));
});

test('test endsWith() method', function() {
    $this->assertTrue(Strings::of('/movies/sg-1/season-5/episode-21/')->endsWith('/'));
    $this->assertFalse(Strings::of('/movies/sg-1/season-5/episode-21/')->endsWith('//'));
});

test('test finish() method', function() {
    $this->assertEquals('/movies/sg-1/season-5/episode-21/', Strings::of('/movies/sg-1/season-5/episode-21')->finish('/'));
});

test('test hash() method', function() {

    // with default params
    $this->assertEquals(Strings::of('test')->hash(), Strings::of('test')->hash());

    // with sha256 algorithm
    $this->assertEquals(Strings::of('test')->hash('sha256'), Strings::of('test')->hash('sha256'));

    // with sha256 algorithm and raw output
    $this->assertEquals(Strings::of('test')->hash('sha256', true), Strings::of('test')->hash('sha256', true));
});

test('test strings() helper', function() {
    $this->assertEquals(Strings::of(), strings());
});
