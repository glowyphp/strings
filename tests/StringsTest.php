<?php

declare(strict_types = 1);

use Atomastic\Strings\Strings;

test('test create() method', function() {
    $this->assertEquals(new Strings(), Strings::create());
});

test('test strings() helper', function() {
    $this->assertEquals(Strings::create(), strings());
});

test('test trimSlashes() method', function() {
    $this->assertEquals('some text here', Strings::create('some text here/')->trimSlashes());
    $this->assertEquals('some text here', Strings::create('some text here//')->trimSlashes());
    $this->assertEquals('some text here', Strings::create('some text here///')->trimSlashes());
});

test('test reduceSlashes() method', function() {
    $this->assertEquals('some/text/here', Strings::create('some//text//here')->reduceSlashes());
    $this->assertEquals('fòô/fòô/fòô', Strings::create('fòô//fòô//fòô')->reduceSlashes());
});

test('test stripQuotes() method', function() {
    $this->assertEquals('some text here', Strings::create('some "text" here')->stripQuotes());
    $this->assertEquals('some text here', Strings::create('some \'"text"\' here')->stripQuotes());
});

test('test quotesToEntities() method', function() {
    $this->assertEquals('&#39; &quot;', Strings::create('\' "')->quotesToEntities());
});

test('test normalizeNewLines() method', function() {
    $this->assertEquals("\n \n", Strings::create("\r\n \r")->normalizeNewLines());
});

test('test normalizeSpaces() method', function() {
    $this->assertEquals(' ', Strings::create('   ')->normalizeSpaces());
});

test('test random() method', function() {
    $this->assertNotEquals(Strings::create()->random(), Strings::create()->random());
    $this->assertNotEquals(Strings::create()->random(10), Strings::create()->random(10));
    $this->assertNotEquals(Strings::create()->random(10, '0123456789'), Strings::create()->random(10, '0123456789'));
    $this->assertEquals(10, Strings::create(Strings::create()->random(10, '0123456789'))->length());
});

test('test increment() method', function() {
    $this->assertEquals('page_2', Strings::create('page_1')->increment());
    $this->assertEquals('page_3', Strings::create('page')->increment(3));
    $this->assertEquals('page-3', Strings::create('page')->increment(3, '-'));
});


test('test limit() method', function() {
    $this->assertEquals('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore...',
                         Strings::create('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.')->limit());

    $this->assertEquals('Lorem...',
                         Strings::create('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.')->limit(5));

    $this->assertEquals('Lorem>>>',
                         Strings::create('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.')->limit(5, '>>>'));
});

test('test lower() method', function() {
    $this->assertEquals('daniel', Strings::create('DANIEL')->lower());
});

test('test upper() method', function() {
    $this->assertEquals('DANIEL', Strings::create('daniel')->upper());
});

test('test studly() method', function() {
    $this->assertEquals('FooBar', Strings::create('foo_bar')->studly());
    $this->assertEquals('FòôBàř', Strings::create('fòô_bàř')->studly());
});

test('test snake() method', function() {
    $this->assertEquals('foo_bar', Strings::create('fooBar')->snake());
    $this->assertEquals('foo__bar', Strings::create('fooBar')->snake('__'));
    $this->assertEquals('fòô_bàř', Strings::create('fòôBàř')->snake());
    $this->assertEquals('fòô__bàř', Strings::create('fòôBàř')->snake('__'));

    $this->assertEquals('fòô_p_h_p_bàř', Strings::create('FòôPHPBàř')->snake());
    $this->assertEquals('fòô_php_bàř', Strings::create('FòôPhpBàř')->snake());
    $this->assertEquals('fòô php bàř', Strings::create('FòôPhpBàř')->snake(' '));
    $this->assertEquals('fòô_php_bàř', Strings::create('Fòô Php Bàř')->snake());
    $this->assertEquals('fòô_php_bàř', Strings::create('Fòô    Php      Bàř   ')->snake());

    // ensure cache keys don't overlap
    $this->assertEquals('fòô__php__bàř', Strings::create('FòôPhpBàř')->snake('__'));
    $this->assertEquals('fòô_php_bàř_', Strings::create('FòôPhpBàř_')->snake('_'));
    $this->assertEquals('fòô_php_bàř', Strings::create('fòô php Bàř')->snake());
    $this->assertEquals('fòô_php_bàř_fòô', Strings::create('fòô php BàřFòô')->snake());
});

test('test camel() method', function() {
    $this->assertEquals('fooBar', Strings::create('foo_bar')->camel());
    $this->assertEquals('fòôBàř', Strings::create('fòô_bàř')->camel());
});

test('test kebab() method', function() {
    $this->assertEquals('foo-bar', Strings::create('fooBar')->kebab());
    $this->assertEquals('fòô-bàř', Strings::create('fòôBàř')->kebab());
});

test('test words() method', function() {
    $this->assertEquals('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum....',
                         Strings::create('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.')->words());

    $this->assertEquals('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do...',
                         Strings::create('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.')->words(10));

    $this->assertEquals('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do>>>',
                         Strings::create('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.')->words(10, '>>>'));
});

test('test countWords() method', function() {
    $this->assertEquals(69,
                         Strings::create('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.')->countWords());
     $this->assertEquals(['Lorem', 'ipsum', 'dolor'],
                          Strings::create('Lorem ipsum dolor')->countWords(1));

     $this->assertEquals([0 => 'Lorem', 6 => 'ipsum', 12 => 'dolor'],
                          Strings::create('Lorem ipsum dolor')->countWords(2));
});

test('test contains() method', function() {
    $this->assertTrue(Strings::create('Lorem ipsum dolor')->contains('ipsum'));
    $this->assertFalse(Strings::create('Lorem ipsum dolor')->contains('test'));
    $this->assertTrue(Strings::create('Lorem ipsum dolor')->contains(['ipsum', 'dolor']));
    $this->assertFalse(Strings::create('Lorem ipsum dolor')->contains(['test1', 'test2']));
});

test('test containsAll() method', function() {
    $this->assertTrue(Strings::create('Lorem ipsum dolor')->containsAll(['ipsum', 'dolor']));
});

test('test containsAny() method', function() {
    $this->assertTrue(Strings::create('Lorem ipsum dolor')->containsAny(['ipsum', 'dolor']));
});

test('test ucfirst() method', function() {
    $this->assertEquals('Daniel', Strings::create('daniel')->ucfirst());
});

test('test capitalize() method', function() {
    $this->assertEquals('Daniel', Strings::create('daniel')->capitalize());
});

test('test length() method', function() {
    $this->assertEquals(4, Strings::create('SG-1')->length());
});

test('test substr() method', function() {
    $this->assertEquals('SG-1 returns from an off-world mission to P9Y-3C3', Strings::create('SG-1 returns from an off-world mission to P9Y-3C3')->substr(0));
    $this->assertEquals('SG-1', Strings::create('SG-1 returns from an off-world mission to P9Y-3C3')->substr(0, 4));
    $this->assertEquals('fòôbàř', Strings::create('fòôbàř')->substr(0));
    $this->assertEquals('fòô', Strings::create('fòôbàř')->substr(0, 3));
});

test('test trim() method', function() {
    $this->assertEquals('daniel', Strings::create(' daniel ')->trim());
    $this->assertEquals('fòôbàř', Strings::create(' fòôbàř ')->trim());
});

test('test trimLeft() method', function() {
    $this->assertEquals('daniel', Strings::create(' daniel')->trimLeft());
    $this->assertEquals('fòôbàř', Strings::create(' fòôbàř')->trimLeft());
});

test('test trimRight() method', function() {
    $this->assertEquals('daniel', Strings::create('daniel ')->trimRight());
    $this->assertEquals('fòôbàř', Strings::create('fòôbàř ')->trimRight());
});

test('test reverse() method', function() {
    $this->assertEquals('1-GS', Strings::create('SG-1')->reverse());
    $this->assertEquals('řàbôòf', Strings::create('fòôbàř')->reverse());
});

test('test segments() method', function() {
    $this->assertEquals(['SG-1', 'returns', 'from', 'an', 'off-world', 'mission'], Strings::create('SG-1 returns from an off-world mission')->segments());
    $this->assertEquals(['movies', 'sg-1', 'season-5', 'episode-21'], Strings::create('movies/sg-1/season-5/episode-21')->segments('/'));
});

test('test segment() method', function() {
    $this->assertEquals('SG-1', Strings::create('SG-1 returns from an off-world mission')->segment(0));
    $this->assertEquals('mission', Strings::create('SG-1 returns from an off-world mission')->segment(-1));
    $this->assertEquals('movies', Strings::create('movies/sg-1/season-5/episode-21')->segment(0, '/'));
    $this->assertEquals('episode-21', Strings::create('movies/sg-1/season-5/episode-21')->segment(-1, '/'));
});

test('test firstSegment() method', function() {
    $this->assertEquals('SG-1', Strings::create('SG-1 returns from an off-world mission')->firstSegment());
    $this->assertEquals('movies', Strings::create('movies/sg-1/season-5/episode-21')->firstSegment('/'));
});

test('test lastSegment() method', function() {
    $this->assertEquals('mission', Strings::create('SG-1 returns from an off-world mission')->lastSegment());
    $this->assertEquals('episode-21', Strings::create('movies/sg-1/season-5/episode-21')->lastSegment('/'));
});

test('test between() method', function() {
    $this->assertEquals(' returns ', Strings::create('SG-1 returns from an off-world mission')->between('SG-1', 'from'));
});

test('test before() method', function() {
    $this->assertEquals('SG-1 returns from an off-world ', Strings::create('SG-1 returns from an off-world mission')->before('mission'));
    $this->assertEquals('fòô ', Strings::create('fòô bàřs')->before('bàřs'));
});

test('test beforeLast() method', function() {
    $this->assertEquals('SG-1 returns from an off-world ', Strings::create('SG-1 returns from an off-world mission')->beforeLast('mission'));
    $this->assertEquals('fòô ', Strings::create('fòô bàřs')->beforeLast('bàřs'));
});

test('test after() method', function() {
    $this->assertEquals(' returns from an off-world mission', Strings::create('SG-1 returns from an off-world mission')->after('SG-1'));
});

test('test afterLast() method', function() {
    $this->assertEquals(' returns from an off-world mission', Strings::create('SG-1 returns from an off-world mission')->afterLast('SG-1'));
});

test('test stripSpaces() method', function() {
    $this->assertEquals('SG-1returnsfromanoff-worldmission', Strings::create('SG-1 returns from an off-world mission')->stripSpaces());
});

test('test padBoth() method', function() {
    $this->assertEquals('------SG-1 returns from an off-world mission------', Strings::create('SG-1 returns from an off-world mission')->padBoth(50, '-'));
});

test('test padRight() method', function() {
    $this->assertEquals('SG-1 returns from an off-world mission------------', Strings::create('SG-1 returns from an off-world mission')->padRight(50, '-'));
});

test('test padLeft() method', function() {
    $this->assertEquals('------------SG-1 returns from an off-world mission', Strings::create('SG-1 returns from an off-world mission')->padLeft(50, '-'));
});

test('test replaceArray() method', function() {
    $this->assertEquals('SG-2 returns from an off-world mission', Strings::create('SG-1 returns from an off-world mission')->replaceArray('SG-1', ['SG-2']));
});

test('test replaceFirst() method', function() {
    $this->assertEquals('SG-2 returns from an off-world mission', Strings::create('SG-1 returns from an off-world mission')->replaceFirst('SG-1', 'SG-2'));
});

test('test replaceLast() method', function() {
    $this->assertEquals('SG-1 returns from an P9Y-3C3 mission', Strings::create('SG-1 returns from an off-world mission')->replaceLast('off-world', 'P9Y-3C3'));
});

test('test start() method', function() {
    $this->assertEquals('/movies/sg-1/season-5/episode-21/', Strings::create('movies/sg-1/season-5/episode-21/')->start('/'));
    $this->assertEquals('/movies/sg-1/season-5/episode-21/', Strings::create('/movies/sg-1/season-5/episode-21/')->start('/'));
    $this->assertEquals('/movies/sg-1/season-5/episode-21/', Strings::create('//movies/sg-1/season-5/episode-21/')->start('/'));
});

test('test startsWith() method', function() {
    $this->assertTrue(Strings::create('/movies/sg-1/season-5/episode-21/')->startsWith('/'));
    $this->assertFalse(Strings::create('/movies/sg-1/season-5/episode-21/')->startsWith('//'));
    $this->assertTrue(Strings::create('fòôbàřs')->startsWith('fòô'));
    $this->assertTrue(Strings::create('fòô')->startsWith('fòô'));
    $this->assertTrue(Strings::create('fòôbàřs')->startsWith(['fòô']));
    $this->assertTrue(Strings::create('fòôbàřs')->startsWith(['bars', 'fòô']));
    $this->assertFalse(Strings::create('fòô')->startsWith('bàř'));
    $this->assertFalse(Strings::create('fòô')->startsWith(['bàř']));
    $this->assertFalse(Strings::create('fòô')->startsWith(null));
    $this->assertFalse(Strings::create('fòô')->startsWith([null]));
    $this->assertFalse(Strings::create('0123')->startsWith([null]));
    $this->assertTrue(Strings::create('0123')->startsWith(0));
    $this->assertFalse(Strings::create('fòôbàřs')->startsWith('F'));
    $this->assertFalse(Strings::create('fòôbàřs')->startsWith(''));
    $this->assertFalse(Strings::create('')->startsWith(''));
    $this->assertTrue(Strings::create('7')->startsWith('7'));
    $this->assertTrue(Strings::create('7a')->startsWith('7'));
    $this->assertTrue(Strings::create('7a')->startsWith(7));
    $this->assertTrue(Strings::create('7.12a')->startsWith(7.12));
    $this->assertFalse(Strings::create('7.12a')->startsWith(7.13));
    $this->assertTrue(Strings::create(7.123)->startsWith('7'));
    $this->assertTrue(Strings::create(7.123)->startsWith('7.12'));
    $this->assertFalse(Strings::create(7.123)->startsWith('7.13'));
});

test('test endsWith() method', function() {
    $this->assertTrue(Strings::create('/movies/sg-1/season-5/episode-21/')->endsWith('/'));
    $this->assertFalse(Strings::create('/movies/sg-1/season-5/episode-21/')->endsWith('//'));
    $this->assertTrue(Strings::create('fòôbàřs')->endsWith('bàřs'));
    $this->assertTrue(Strings::create('fòô')->endsWith('fòô'));
    $this->assertTrue(Strings::create('fòôbàřs')->endsWith(['bàřs']));
    $this->assertTrue(Strings::create('fòôbàřs')->endsWith(['bar', 'bàřs']));
    $this->assertFalse(Strings::create('fòô')->endsWith('bàř'));
    $this->assertFalse(Strings::create('fòô')->endsWith(['bàř']));
    $this->assertFalse(Strings::create('fòô')->endsWith(null));
    $this->assertFalse(Strings::create('fòô')->endsWith([null]));
    $this->assertFalse(Strings::create('0123')->endsWith([null]));
    $this->assertTrue(Strings::create('0123')->endsWith(3));
    $this->assertFalse(Strings::create('fòôbàřs')->endsWith('F'));
    $this->assertFalse(Strings::create('fòôbàřs')->endsWith(''));
    $this->assertFalse(Strings::create('')->endsWith(''));
    $this->assertTrue(Strings::create('7')->endsWith('7'));
    $this->assertTrue(Strings::create('a7')->endsWith('7'));
    $this->assertTrue(Strings::create('a7')->endsWith(7));
    $this->assertTrue(Strings::create('a7.12')->endsWith(7.12));
    $this->assertFalse(Strings::create('a7.12')->endsWith(7.13));
    $this->assertTrue(Strings::create(7.123)->endsWith('3'));
    $this->assertTrue(Strings::create(7.123)->endsWith('.123'));
    $this->assertFalse(Strings::create(7.123)->endsWith('7.13'));
});

test('test finish() method', function() {
    $this->assertEquals('/movies/sg-1/season-5/episode-21/', Strings::create('/movies/sg-1/season-5/episode-21')->finish('/'));
    $this->assertEquals('/movies/sg-1/season-5/episode-21/', Strings::create('/movies/sg-1/season-5/episode-21/')->finish('/'));
    $this->assertEquals('/movies/sg-1/season-5/episode-21/', Strings::create('/movies/sg-1/season-5/episode-21//')->finish('/'));
});

test('test hash() method', function() {
    $this->assertEquals(Strings::create('test')->hash(), Strings::create('test')->hash());
    $this->assertEquals(Strings::create('test')->hash('sha256'), Strings::create('test')->hash('sha256'));
    $this->assertEquals(Strings::create('test')->hash('sha256', true), Strings::create('test')->hash('sha256', true));
});

test('test prepend() method', function() {
    $this->assertEquals('WORK HARD. PLAY HARD.', Strings::create('PLAY HARD.')->prepend('WORK HARD. '));
});

test('test append() method', function() {
    $this->assertEquals('WORK HARD. PLAY HARD.', Strings::create('WORK HARD.')->append(' PLAY HARD.'));
});

test('test shuffle() method', function() {
    $this->assertEquals(Strings::create('fòôbàřs')->length(),
                        Strings::create(Strings::create('fòôbàřs')->shuffle())->length());

    $this->assertEquals(Strings::create('WORK HARD. PLAY HARD.')->length(),
                        Strings::create(Strings::create('WORK HARD. PLAY HARD.')->shuffle())->length());
});

test('test similarity() method', function() {
    $this->assertEquals(100, Strings::create('fòôbàřs')->similarity('fòôbàřs'));
    $this->assertEquals(62.5, Strings::create('fòôbàřs')->similarity('fòô'));
});

test('test at() method', function() {
    $this->assertEquals('ô', Strings::create('fòôbàřs')->at(2));
});
