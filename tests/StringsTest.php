<?php

declare(strict_types=1);

use Atomastic\Strings\Strings;

test('test __construct() method', function (): void {
    $this->assertInstanceOf(Strings::class, new Strings());

    $mb_internal_encoding = mb_internal_encoding();
    $strings              = new Strings('', null);
    $this->assertEquals($mb_internal_encoding, $strings->getEncoding());
});


test('test __construct() throws exception InvalidArgumentException with array param', function (): void {
    $strings = new Strings([]);
})->throws(InvalidArgumentException::class);

test('test __construct() throws exception InvalidArgumentException with object without __toString', function (): void {
    $strings = new Strings((object) []);
})->throws(InvalidArgumentException::class);

test('test create() method', function (): void {
    $this->assertEquals(new Strings(), Strings::create());
});

test('test strings() helper', function (): void {
    $this->assertEquals(Strings::create(), strings());
});

test('test trimSlashes() method', function (): void {
    $this->assertEquals('some text here', Strings::create('some text here/')->trimSlashes());
    $this->assertEquals('some text here', Strings::create('some text here//')->trimSlashes());
    $this->assertEquals('some text here', Strings::create('some text here///')->trimSlashes());
});

test('test reduceSlashes() method', function (): void {
    $this->assertEquals('some/text/here', Strings::create('some//text//here')->reduceSlashes());
    $this->assertEquals('fòô/fòô/fòô', Strings::create('fòô//fòô//fòô')->reduceSlashes());
});

test('test stripQuotes() method', function (): void {
    $this->assertEquals('some text here', Strings::create('some "text" here')->stripQuotes());
    $this->assertEquals('some text here', Strings::create('some \'"text"\' here')->stripQuotes());
});

test('test quotesToEntities() method', function (): void {
    $this->assertEquals('&#39; &quot;', Strings::create('\' "')->quotesToEntities());
});

test('test normalizeNewLines() method', function (): void {
    $this->assertEquals("\n \n", Strings::create("\r\n \r")->normalizeNewLines());
});

test('test normalizeSpaces() method', function (): void {
    $this->assertEquals(' ', Strings::create('   ')->normalizeSpaces());
});

test('test random() method', function (): void {
    $this->assertTrue(is_string(Strings::create()->random(0)->toString()));
    $this->assertStringContainsString(Strings::create()->random(0)->toString(), '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
    $this->assertNotEquals(Strings::create()->random(), Strings::create()->random());
    $this->assertNotEquals(Strings::create()->random(100), Strings::create()->random(100));
    $this->assertNotEquals(Strings::create()->random(10, '0123456789'), Strings::create()->random(10, '0123456789'));
    $this->assertEquals(10, Strings::create(Strings::create()->random(10, '0123456789'))->length());
});

test('test increment() method', function (): void {
    $this->assertEquals('page_2', Strings::create('page_1')->increment());
    $this->assertEquals('page_3', Strings::create('page')->increment(3));
    $this->assertEquals('page-3', Strings::create('page')->increment(3, '-'));
});


test('test limit() method', function (): void {
    $this->assertEquals(
        'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore...',
        Strings::create('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.')->limit()
    );

    $this->assertEquals(
        'Lorem...',
        Strings::create('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.')->limit(5)
    );

    $this->assertEquals(
        'Excepteur sint occaecat cupidatat non proident',
        Strings::create('Excepteur sint occaecat cupidatat non proident')->limit(100)
    );

    $this->assertEquals(
        'Lorem>>>',
        Strings::create('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.')->limit(5, '>>>')
    );
});

test('test lower() method', function (): void {
    $this->assertEquals('daniel', Strings::create('DANIEL')->lower());
});

test('test upper() method', function (): void {
    $this->assertEquals('DANIEL', Strings::create('daniel')->upper());
});

test('test studly() method', function (): void {
    $this->assertEquals('FooBar', Strings::create('foo_bar')->studly());
    $this->assertEquals('FòôBàř', Strings::create('fòô_bàř')->studly());
});

test('test snake() method', function (): void {
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

test('test camel() method', function (): void {
    $this->assertEquals('fooBar', Strings::create('foo_bar')->camel());
    $this->assertEquals('fòôBàř', Strings::create('fòô_bàř')->camel());
});

test('test kebab() method', function (): void {
    $this->assertEquals('foo-bar', Strings::create('fooBar')->kebab());
    $this->assertEquals('fòô-bàř', Strings::create('fòôBàř')->kebab());
});

test('test chars() method', function (): void {
    $this->assertEquals(
        ['F', 'ò', 'ô'],
        Strings::create('Fòô')->chars()
    );
});

test('test lines() method', function (): void {
    $this->assertEquals(
        ['Fòô òô', ' fòô fò fò ', 'fò'],
        Strings::create("Fòô òô\n fòô fò fò \nfò\r")->lines()
    );
});

test('test words() method', function (): void {
    $this->assertEquals(
        ['Fòô', 'fòô', 'òôf'],
        Strings::create('Fòô! fòô; òôf!? ! !!')->words()
    );

    $this->assertEquals(
        ['Fòô', 'fòô;', 'òôf', '?'],
        Strings::create('Fòô! fòô; òôf!? ! !!')->words('!')
    );

    $this->assertEquals(
        ['F', 'òô', 'fòô', 'òôf'],
        Strings::create('F!òô! fòô; òôf!? ! !!')->words()
    );
});

test('test wordsLimit() method', function (): void {
    $this->assertEquals(
        'fòô...',
        Strings::create('fòô fòô òôf')->wordsLimit(1)
    );

    $this->assertEquals(
        'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum....',
        Strings::create('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.')->wordsLimit()
    );

    $this->assertEquals(
        'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do...',
        Strings::create('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.')->wordsLimit(10)
    );

    $this->assertEquals(
        'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do>>>',
        Strings::create('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.')->wordsLimit(10, '>>>')
    );
});

test('test wordsCount() method', function (): void {
    $this->assertEquals(
        69,
        Strings::create('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.')->wordsCount()
    );

    $this->assertEquals(
        4,
        Strings::create('fòôs fòô php bàř!?')->wordsCount()
    );
});

test('test contains() method', function (): void {
    $this->assertTrue(Strings::create('Lorem ipsum dolor')->contains('ipsum'));
    $this->assertFalse(Strings::create('Lorem ipsum dolor')->contains('test'));
    $this->assertTrue(Strings::create('Lorem ipsum dolor')->contains(['ipsum', 'dolor']));
    $this->assertFalse(Strings::create('Lorem ipsum dolor')->contains(['test1', 'test2']));

    $this->assertFalse(Strings::create('Lorem ipsum Dolor')->contains('dolor'));
    $this->assertTrue(Strings::create('Lorem ipsum Dolor')->contains('dolor', false));

    $this->assertFalse(Strings::create('Lorem Ipsum Dolor')->contains(['ipsum', 'dolor']));
    $this->assertTrue(Strings::create('Lorem Ipsum Dolor')->contains(['ipsum', 'dolor'], false));
});

test('test containsAll() method', function (): void {
    $this->assertTrue(Strings::create('Lorem ipsum dolor')->containsAll(['ipsum', 'dolor']));

    $this->assertFalse(Strings::create('Lorem Ipsum Dolor')->containsAll(['ipsum', 'dolor']));
    $this->assertTrue(Strings::create('Lorem Ipsum Dolor')->containsAll(['ipsum', 'dolor'], false));
});

test('test containsAny() method', function (): void {
    $this->assertTrue(Strings::create('Lorem ipsum dolor')->containsAny(['ipsum', 'dolor']));

    $this->assertFalse(Strings::create('Lorem Ipsum Dolor')->containsAny(['ipsum', 'dolor']));
    $this->assertTrue(Strings::create('Lorem Ipsum Dolor')->containsAny(['ipsum', 'dolor'], false));
});

test('test ucfirst() method', function (): void {
    $this->assertEquals('Daniel', Strings::create('daniel')->ucfirst());
});

test('test capitalize() method', function (): void {
    $this->assertEquals('Daniel', Strings::create('daniel')->capitalize());
});

test('test length() method', function (): void {
    $this->assertEquals(4, Strings::create('SG-1')->length());
});

test('test count() method', function (): void {
    $this->assertEquals(4, Strings::create('SG-1')->count());
});

test('test countSubString() method', function (): void {
    $this->assertEquals(3, Strings::create('fòôbàř fòô bàř fòôbàř')->countSubString('fòô'));
    $this->assertEquals(3, Strings::create('fòôbàř Fòô bàř fòôbàř')->countSubString('Fòô', false));
});

test('test substr() method', function (): void {
    $this->assertEquals('SG-1 returns from an off-world mission to P9Y-3C3', Strings::create('SG-1 returns from an off-world mission to P9Y-3C3')->substr(0));
    $this->assertEquals('SG-1', Strings::create('SG-1 returns from an off-world mission to P9Y-3C3')->substr(0, 4));
    $this->assertEquals('fòôbàř', Strings::create('fòôbàř')->substr(0));
    $this->assertEquals('fòô', Strings::create('fòôbàř')->substr(0, 3));
});

test('test trim() method', function (): void {
    $this->assertEquals('daniel', Strings::create(' daniel ')->trim());
    $this->assertEquals('fòôbàř', Strings::create(' fòôbàř ')->trim());
});

test('test trimLeft() method', function (): void {
    $this->assertEquals('daniel', Strings::create(' daniel')->trimLeft());
    $this->assertEquals('fòôbàř', Strings::create(' fòôbàř')->trimLeft());
});

test('test trimRight() method', function (): void {
    $this->assertEquals('daniel', Strings::create('daniel ')->trimRight());
    $this->assertEquals('fòôbàř', Strings::create('fòôbàř ')->trimRight());
});

test('test reverse() method', function (): void {
    $this->assertEquals('1-GS', Strings::create('SG-1')->reverse());
    $this->assertEquals('řàbôòf', Strings::create('fòôbàř')->reverse());
});

test('test segments() method', function (): void {
    $this->assertEquals(['SG-1', 'returns', 'from', 'an', 'off-world', 'mission'], Strings::create('SG-1 returns from an off-world mission')->segments());
    $this->assertEquals(['Fòôbàřs', 'Fòô', 'bàřs'], Strings::create('Fòôbàřs Fòô bàřs')->segments());
    $this->assertEquals(['movies', 'sg-1', 'season-5', 'episode-21'], Strings::create('movies/sg-1/season-5/episode-21')->segments('/'));
});

test('test segment() method', function (): void {
    $this->assertEquals('SG-1', Strings::create('SG-1 returns from an off-world mission')->segment(0));
    $this->assertEquals('mission', Strings::create('SG-1 returns from an off-world mission')->segment(-1));
    $this->assertEquals('movies', Strings::create('movies/sg-1/season-5/episode-21')->segment(0, '/'));
    $this->assertEquals('episode-21', Strings::create('movies/sg-1/season-5/episode-21')->segment(-1, '/'));
});

test('test firstSegment() method', function (): void {
    $this->assertEquals('SG-1', Strings::create('SG-1 returns from an off-world mission')->firstSegment());
    $this->assertEquals('movies', Strings::create('movies/sg-1/season-5/episode-21')->firstSegment('/'));
});

test('test lastSegment() method', function (): void {
    $this->assertEquals('mission', Strings::create('SG-1 returns from an off-world mission')->lastSegment());
    $this->assertEquals('episode-21', Strings::create('movies/sg-1/season-5/episode-21')->lastSegment('/'));
});

test('test between() method', function (): void {
    $this->assertEquals(' returns ', Strings::create('SG-1 returns from an off-world mission')->between('SG-1', 'from'));
    $this->assertEquals('SG-1 returns from an off-world mission', Strings::create('SG-1 returns from an off-world mission')->between('', ''));
});

test('test before() method', function (): void {
    $this->assertEquals('SG-1 returns from an off-world ', Strings::create('SG-1 returns from an off-world mission')->before('mission'));
    $this->assertEquals('fòô ', Strings::create('fòô bàřs')->before('bàřs'));
});

test('test beforeLast() method', function (): void {
    $this->assertEquals('SG-1 returns from an off-world ', Strings::create('SG-1 returns from an off-world mission')->beforeLast('mission'));
    $this->assertEquals('fòô ', Strings::create('fòô bàřs')->beforeLast('bàřs'));
    $this->assertEquals('fòô bàřs', Strings::create('fòô bàřs')->beforeLast('123'));
});

test('test after() method', function (): void {
    $this->assertEquals(' returns from an off-world mission', Strings::create('SG-1 returns from an off-world mission')->after('SG-1'));
});

test('test afterLast() method', function (): void {
    $this->assertEquals(' returns from an off-world mission', Strings::create('SG-1 returns from an off-world mission')->afterLast('SG-1'));
    $this->assertEquals('fòô bàřs', Strings::create('fòô bàřs')->afterLast('123'));
});

test('test stripSpaces() method', function (): void {
    $this->assertEquals('SG-1returnsfromanoff-worldmission', Strings::create('SG-1 returns from an off-world mission')->stripSpaces());
    $this->assertEquals('fòôbàřsfòôbàřsfòôbàřs', Strings::create('fòôbàřs fòôbàřs fòô bàřs')->stripSpaces());
});

test('test padBoth() method', function (): void {
    $this->assertEquals('------SG-1 returns from an off-world mission------', Strings::create('SG-1 returns from an off-world mission')->padBoth(50, '-'));
});

test('test padRight() method', function (): void {
    $this->assertEquals('SG-1 returns from an off-world mission------------', Strings::create('SG-1 returns from an off-world mission')->padRight(50, '-'));
});

test('test padLeft() method', function (): void {
    $this->assertEquals('------------SG-1 returns from an off-world mission', Strings::create('SG-1 returns from an off-world mission')->padLeft(50, '-'));
});

test('test replacePunctuations() method', function (): void {
    $this->assertEquals('Fòôbàřs Fòô bàřs', Strings::create('Fòôbàřs. Fòô, bàřs')->replacePunctuations()->toString());
    $this->assertEquals('Fòôbàřs-Fòô-bàřs', Strings::create('Fòôbàřs. Fòô, bàřs')->replacePunctuations('-', true)->toString());
    $this->assertEquals('FòôbàřsFòôbàřs', Strings::create('Fòôbàřs. Fòô, bàřs')->replacePunctuations('', true)->toString());
});

test('test replaceDashes() method', function (): void {
    $this->assertEquals('Fòôbàřs  Fòô  bàřs', Strings::create('Fòôbàřs - Fòô - bàřs')->replaceDashes()->toString());
    $this->assertEquals('Fòôbàřs_Fòô_bàřs', Strings::create('Fòôbàřs-Fòô-bàřs')->replaceDashes('_')->toString());
    $this->assertEquals('Fòôbàřs_Fòô_bàřs', Strings::create('Fòôbàřs-Fòô-bàřs')->replaceDashes('_', true)->toString());
});

test('test replaceNonAlphanumeric() method', function (): void {
    $this->assertEquals('Fòôbàřs 123', Strings::create('Fòôbàřs 123')->replaceNonAlphanumeric()->toString());
    $this->assertEquals('Fòôbàřs123', Strings::create('Fòô-bàřs-123')->replaceNonAlphanumeric()->toString());
    $this->assertEquals('Fòô bàřs 123', Strings::create('Fòô-bàřs-123')->replaceNonAlphanumeric(' ')->toString());
    $this->assertEquals('Fòô_bàřs_123', Strings::create('Fòô-bàřs-123')->replaceNonAlphanumeric('_')->toString());
    $this->assertEquals('Foo Bar 123', Strings::create('Foo Bar 123')->replaceNonAlphanumeric()->toString());
    $this->assertEquals('Foo Bar 123', Strings::create('Foo Bar 123{}.,;=-@#$!@$#$(!&*!$^!)')->replaceNonAlphanumeric()->toString());
    $this->assertEquals('FooBar123', Strings::create('Foo Bar 123{}.,;=-@#$!@$#$(!&*!$^!)')->replaceNonAlphanumeric('', true)->toString());
});

test('test replaceNonAlpha() method', function (): void {
    $this->assertEquals('Fòôbàřs ', Strings::create('Fòôbàřs 123')->replaceNonAlpha()->toString());
    $this->assertEquals('Fòôbàřs', Strings::create('Fòô-bàřs-123')->replaceNonAlpha()->toString());
    $this->assertEquals('Fòô bàřs ', Strings::create('Fòô-bàřs-123')->replaceNonAlpha(' ')->toString());
    $this->assertEquals('Fòô_bàřs_', Strings::create('Fòô-bàřs-123')->replaceNonAlpha('_')->toString());
    $this->assertEquals('Foo Bar ', Strings::create('Foo Bar 123')->replaceNonAlpha()->toString());
    $this->assertEquals('Foo Bar ', Strings::create('Foo Bar 123{}.,;=-@#$!@$#$(!&*!$^!)')->replaceNonAlpha()->toString());
    $this->assertEquals('FooBar', Strings::create('Foo Bar 123{}.,;=-@#$!@$#$(!&*!$^!)')->replaceNonAlpha('', true)->toString());
});

test('test pipe() method', function (): void {
    $strings = new Strings('Fòô');

    $this->assertEquals('Fòô bàřs', $strings->pipe(static function ($strings) {
        $word = ' bàřs';

        return $strings->append($word);
    }));
});

test('test replace() method', function (): void {
    $this->assertEquals('fòô/bàř/bàz', Strings::create('?/*/#')->replace('?', 'fòô')
                                                               ->replace('*', 'bàř')
                                                               ->replace('#', 'bàz'));
});

test('test replaceArray() method', function (): void {
    $this->assertEquals('fòô/bàř/bàz', Strings::create('?/?/?')->replaceArray('?', ['fòô', 'bàř', 'bàz']));
    $this->assertEquals('fòô/bàř/bàz/?', Strings::create('?/?/?/?')->replaceArray('?', ['fòô', 'bàř', 'bàz']));
    $this->assertEquals('fòô/bàř', Strings::create('?/?')->replaceArray('?', ['fòô', 'bàř', 'bàz']));
    $this->assertEquals('?/?/?', Strings::create('?/?/?')->replaceArray('x', ['fòô', 'bàř', 'bàz']));
    $this->assertEquals('fòô?/bàř/bàz', Strings::create('?/?/?')->replaceArray('?', ['fòô?', 'bàř', 'bàz']));
    $this->assertEquals('fòô/bàř', Strings::create('?/?')->replaceArray('?', [1 => 'fòô', 2 => 'bàř']));
    $this->assertEquals('fòô/bàř', Strings::create('?/?')->replaceArray('?', ['x' => 'fòô', 'y' => 'bàř']));
});

test('test replaceFirst() method', function (): void {
    $this->assertEquals('SG-2 returns from an off-world mission', Strings::create('SG-1 returns from an off-world mission')->replaceFirst('SG-1', 'SG-2'));
    $this->assertEquals('SG-3', Strings::create('SG-1 returns from an off-world mission')->replaceFirst('SG-3', 'SG-4'));
});

test('test replaceLast() method', function (): void {
    $this->assertEquals('SG-1 returns from an P9Y-3C3 mission', Strings::create('SG-1 returns from an off-world mission')->replaceLast('off-world', 'P9Y-3C3'));
    $this->assertEquals('SG-3', Strings::create('SG-1 returns from an off-world mission')->replaceLast('SG-3', 'SG-4'));
});

test('test start() method', function (): void {
    $this->assertEquals('/movies/sg-1/season-5/episode-21/', Strings::create('movies/sg-1/season-5/episode-21/')->start('/'));
    $this->assertEquals('/movies/sg-1/season-5/episode-21/', Strings::create('/movies/sg-1/season-5/episode-21/')->start('/'));
    $this->assertEquals('/movies/sg-1/season-5/episode-21/', Strings::create('//movies/sg-1/season-5/episode-21/')->start('/'));
});

test('test startsWith() method', function (): void {
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

test('test endsWith() method', function (): void {
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

test('test finish() method', function (): void {
    $this->assertEquals('/movies/sg-1/season-5/episode-21/', Strings::create('/movies/sg-1/season-5/episode-21')->finish('/'));
    $this->assertEquals('/movies/sg-1/season-5/episode-21/', Strings::create('/movies/sg-1/season-5/episode-21/')->finish('/'));
    $this->assertEquals('/movies/sg-1/season-5/episode-21/', Strings::create('/movies/sg-1/season-5/episode-21//')->finish('/'));
});

test('test hash() method', function (): void {
    $this->assertEquals(Strings::create('test')->hash(), Strings::create('test')->hash());
    $this->assertEquals(Strings::create('test')->hash('sha256'), Strings::create('test')->hash('sha256'));
    $this->assertEquals(Strings::create('test')->hash('sha256', true), Strings::create('test')->hash('sha256', true));
    $this->assertEquals(Strings::create('test')->hash('foo'), Strings::create('test')->hash('foo'));
});

test('test prepend() method', function (): void {
    $this->assertEquals('WORK HARD. PLAY HARD.', Strings::create('PLAY HARD.')->prepend('WORK HARD. '));
});

test('test append() method', function (): void {
    $this->assertEquals('WORK HARD. PLAY HARD.', Strings::create('WORK HARD.')->append(' PLAY HARD.'));
});

test('test shuffle() method', function (): void {
    $this->assertEquals(
        Strings::create('fòôbàřs')->length(),
        Strings::create(Strings::create('fòôbàřs')->shuffle())->length()
    );

    $this->assertEquals(
        Strings::create('WORK HARD. PLAY HARD.')->length(),
        Strings::create(Strings::create('WORK HARD. PLAY HARD.')->shuffle())->length()
    );
});

test('test similarity() method', function (): void {
    $this->assertEquals(100, Strings::create('fòôbàřs')->similarity('fòôbàřs'));
    $this->assertEquals(62.5, Strings::create('fòôbàřs')->similarity('fòô'));
});

test('test isSimilar() method', function (): void {
    $this->assertTrue(Strings::create('fòôbàřs')->isSimilar('fòôbàřs'));
    $this->assertFalse(Strings::create('fòôbàřs')->isSimilar('fò'));
});

test('test at() method', function (): void {
    $this->assertEquals('ô', Strings::create('fòôbàřs')->at(2));
    $this->assertEquals('b', Strings::create('fòôbàřs')->at(3));
});

test('test move() method', function (): void {
    $this->assertEquals('bàřsfòô', Strings::create('fòôbàřs')->move(0, 3, 7));
    $this->assertEquals('fòôbàřs', Strings::create('fòôbàřs')->move(0, 7, 7));
});

test('test indexOf() method', function (): void {
    $this->assertEquals(0, Strings::create('fòôbàřs')->indexOf('fòô'));
    $this->assertEquals(3, Strings::create('fòôbàřs')->indexOf('bàřs'));
    $this->assertEquals(3, Strings::create('fòôbàřs')->indexOf('bàřs', 3));
    $this->assertEquals(3, Strings::create('fòôBàřs')->indexOf('bàřs', 3, false));
    $this->assertEquals(3, Strings::create('fòôBàřs')->indexOf('bàřs', 0, false));
    $this->assertFalse(Strings::create('')->indexOf(''));
});

test('test indexOfLast() method', function (): void {
    $this->assertFalse(Strings::create('')->indexOfLast(''));
    $this->assertFalse(Strings::create('')->indexOfLast('', 10));
    $this->assertFalse(Strings::create('')->indexOfLast('', -10));
    $this->assertFalse(Strings::create('à')->indexOfLast('à', 10));
    $this->assertFalse(Strings::create('à')->indexOfLast('à', -10));
    $this->assertEquals(11, Strings::create('bàřsfòôbàřsfòô')->indexOfLast('fòô'));
    $this->assertEquals(11, Strings::create('bàřsfòôbàřsfòô')->indexOfLast('fòô', 11));
    $this->assertEquals(11, Strings::create('bàřsfòôbàřsFòô')->indexOfLast('Fòô', 0, false));
});

test('test toString() method', function (): void {
    $this->assertTrue(is_string(Strings::create('fòôbàřs')->toString()));
});

test('test toInteger() method', function (): void {
    $this->assertTrue(is_int(Strings::create('10')->toInteger()));
});

test('test toFloat() method', function (): void {
    $this->assertTrue(is_float(Strings::create('7.13')->toFloat()));
});

test('test toBoolean() method', function (): void {
    $this->assertTrue(Strings::create('1')->toBoolean());
    $this->assertTrue(Strings::create(1)->toBoolean());
    $this->assertTrue(Strings::create('true')->toBoolean());
    $this->assertTrue(Strings::create('trUe')->toBoolean());
    $this->assertTrue(Strings::create('TRUE')->toBoolean());
    $this->assertTrue(Strings::create('on')->toBoolean());
    $this->assertFalse(Strings::create('0')->toBoolean());
    $this->assertFalse(Strings::create(0)->toBoolean());
    $this->assertFalse(Strings::create('false')->toBoolean());
    $this->assertFalse(Strings::create('off')->toBoolean());
    $this->assertFalse(Strings::create('falSe')->toBoolean());
    $this->assertFalse(Strings::create('FALSE')->toBoolean());

    // Default is true
    $this->assertTrue(Strings::create('fòôbàřs')->toBoolean());

    // Empty is false
    $this->assertFalse(Strings::create()->toBoolean());
});

test('test toArray() method', function (): void {
    $this->assertEquals(['fòôbàřs'], Strings::create('fòôbàřs')->toArray());
    $this->assertEquals(['fòô', 'bàřs'], Strings::create('fòô bàřs')->toArray(' '));
    $this->assertEquals(['fòô', 'bàřs'], Strings::create(' fòô bàřs ')->toArray(' '));
    $this->assertEquals(['fòô', 'bàřs'], Strings::create(' fòô bàřs ')->toArray(' '));
});

test('test wordsSortAsc() method', function (): void {
    $this->assertEquals('apple bàřs car fòô', Strings::create('car fòô bàřs apple')->wordsSortAsc()->toString());
});

test('test wordsSortDesc() method', function (): void {
    $this->assertEquals('fòô car bàřs apple', Strings::create('car fòô bàřs apple')->wordsSortDesc()->toString());
});

test('test wordsFrequency() method', function (): void {
    $this->assertEquals(['car' => '25.00', 'fòô' => '25.00', 'bàřs' => '25.00', 'apple' => '25.00'], Strings::create('car fòô bàřs apple')->wordsFrequency());
    $this->assertEquals(['car' => '25', 'fòô' => '25', 'bàřs' => '25', 'apple' => '25'], Strings::create('car fòô bàřs apple')->wordsFrequency(0));
    $this->assertEquals(['fòô' => '40.00', 'àřs' => '20.00', 'car' => '10.00', 'bàřs' => '10.00', 'àř' => '10.00', 'apple' => '10.00'], Strings::create('car fòô fòô fòô fòô bàřs àřs àřs àř apple')->wordsFrequency());
    $this->assertEquals(['fòô' => '40.00', 'àřs' => '20.00', 'car' => '10.00', 'bàřs' => '10.00', 'àř' => '10.00', 'apple' => '10.00'], Strings::create('car fòô, fòô fòô, fòô bàřs. àřs àřs àř apple')->wordsFrequency());
});

test('test charsFrequency() method', function (): void {
    $this->assertEquals(['c' => '33.33', 'a' => '33.33', 'r' => '33.33'], Strings::create('car')->charsFrequency());
    $this->assertEquals([
        'ò' => '16.67',
        'ô' => '16.67',
        'c' => '8.33',
        'a' => '8.33',
        'r' => '8.33',
        'f' => '8.33',
        'b' => '8.33',
        'à' => '8.33',
        'ř' => '8.33',
        's' => '8.33',
    ], Strings::create('car fòôbàřs òô')->charsFrequency());
     $this->assertEquals([
         'ò' => '18.18',
         'ô' => '18.18',
         '!' => '9.09',
         'c' => '9.09',
         'a' => '9.09',
         'r' => '9.09',
         '#' => '9.09',
         'f' => '9.09',
         '@' => '9.09',
     ], Strings::create(' !car   #fòô   @òô ')->charsFrequency());
});

test('test insert() method', function (): void {
    $this->assertEquals('fòôfòôbàřs', Strings::create('fòôbàřs')->insert('fòô', 3));
});

test('test isEmpty() method', function (): void {
    $this->assertTrue(Strings::create()->isEmpty());
    $this->assertFalse(Strings::create(' ')->isEmpty());
    $this->assertFalse(Strings::create('fòôbàřs')->isEmpty());
});

test('test isAscii() method', function (): void {
    $this->assertTrue(Strings::create('#')->isAscii());
    $this->assertFalse(Strings::create('fòôbàřs')->isAscii());
});

test('test isAlphanumeric() method', function (): void {
    $this->assertTrue(Strings::create('fòôbàřs')->isAlphanumeric());
    $this->assertTrue(Strings::create('12345')->isAlphanumeric());
    $this->assertTrue(Strings::create('fòôbàřs12345')->isAlphanumeric());
});

test('test isAlpha() method', function (): void {
    $this->assertTrue(Strings::create('fòôbàřs')->isAlpha());
    $this->assertFalse(Strings::create('12345')->isAlpha());
    $this->assertFalse(Strings::create('fòôbàřs12345')->isAlpha());
});

test('test isBlank() method', function (): void {
    $this->assertTrue(Strings::create(' ')->isBlank());
    $this->assertFalse(Strings::create(' fòôbàřs')->isBlank());
});

test('test isNumeric() method', function (): void {
    $this->assertTrue(Strings::create(42)->isNumeric());
    $this->assertTrue(Strings::create('42')->isNumeric());
    $this->assertTrue(Strings::create(0x539)->isNumeric());
    $this->assertFalse(Strings::create('0x539')->isNumeric());
    $this->assertTrue(Strings::create(02471)->isNumeric());
    $this->assertTrue(Strings::create('02471')->isNumeric());
    $this->assertTrue(Strings::create(0b10100111001)->isNumeric());
    $this->assertFalse(Strings::create('0b10100111001')->isNumeric());
    $this->assertTrue(Strings::create(1337e0)->isNumeric());
    $this->assertTrue(Strings::create('1337e0')->isNumeric());
    $this->assertFalse(Strings::create('not numeric')->isNumeric());
    $this->assertTrue(Strings::create(9.1)->isNumeric());
    $this->assertFalse(Strings::create(null)->isNumeric());
});

test('test isDigit() method', function (): void {
    $this->assertFalse(Strings::create('fòôbàřs')->isDigit());
    $this->assertTrue(Strings::create('01234569')->isDigit());
    $this->assertFalse(Strings::create('fòôbàřs01234569')->isDigit());
});

test('test isEmail() method', function (): void {
    $this->assertTrue(Strings::create('awilum@atomastic.com')->isEmail());
    $this->assertFalse(Strings::create('awilum.atomastic.com')->isEmail());
});

test('test isUrl() method', function (): void {
    $this->assertTrue(Strings::create('http://atomastic.com')->isUrl());
    $this->assertFalse(Strings::create('atomastic.com')->isUrl());
});

test('test isLower() method', function (): void {
    $this->assertTrue(Strings::create('fòôbàřs')->isLower());
    $this->assertFalse(Strings::create('Fòôbàřs')->isLower());
});

test('test isUpper() method', function (): void {
    $this->assertFalse(Strings::create('fòôbàřs')->isUpper());
    $this->assertTrue(Strings::create('FOOBAR')->isUpper());
});

test('test isHexadecimal() method', function (): void {
    $this->assertFalse(Strings::create('fòôbàřs')->isHexadecimal());
    $this->assertTrue(Strings::create('19FDE')->isHexadecimal());
});

test('test isPrintable() method', function (): void {
    $this->assertTrue(Strings::create('fòôbàřs')->isPrintable());
    $this->assertTrue(Strings::create('19FDE')->isPrintable());
    $this->assertTrue(Strings::create('LKA#@%.54')->isPrintable());
});

test('test isPunctuation() method', function (): void {
    $this->assertFalse(Strings::create('fòôbàřs')->isPunctuation());
    $this->assertTrue(Strings::create(',')->isPunctuation());
    $this->assertTrue(Strings::create('.')->isPunctuation());
});

test('test isJson() method', function (): void {
    $this->assertTrue(Strings::create('{"yaml": "json"}')->isJson());
    $this->assertFalse(Strings::create('fòôbàřs')->isJson());
});

test('test isSerialized() method', function (): void {
    $this->assertFalse(Strings::create()->isSerialized());
    $this->assertTrue(Strings::create('s:6:"foobar";')->isSerialized());
    $this->assertTrue(Strings::create('s:11:"fòôbàřs";')->isSerialized());
    $this->assertFalse(Strings::create('fòôbàřs')->isSerialized());
});

test('test isBase64() method', function (): void {
    $this->assertTrue(Strings::create('ZsOyw7Riw6DFmXM=')->isBase64());
    $this->assertFalse(Strings::create('fòôbàřs')->isBase64());
    $this->assertFalse(Strings::create()->isBase64());
});

test('test isEqual() method', function (): void {
    $this->assertTrue(Strings::create('fòôbàřs')->isEqual('fòôbàřs'));
    $this->assertFalse(Strings::create('fòôbàřs')->isEqual('fòô'));
});

test('test isIP() method', function (): void {
    $this->assertTrue(Strings::create('127.0.0.1')->isIP());
    $this->assertFalse(Strings::create('fòôbàřs')->isIP());
});

test('test isMAC() method', function (): void {
    $this->assertTrue(Strings::create('00:11:22:33:44:55')->isMAC());
    $this->assertFalse(Strings::create('127.0.0.1')->isMAC());
});

test('test isHTML() method', function (): void {
    $this->assertTrue(Strings::create('<b>fòôbàřs</b>')->isHTML());
    $this->assertTrue(Strings::create('fòôbàřs<br>')->isHTML());
    $this->assertFalse(Strings::create('fòôbàřs')->isHTML());
});

test('test isBoolean() method', function (): void {
    $this->assertTrue(Strings::create('1')->isBoolean());
    $this->assertTrue(Strings::create(1)->isBoolean());
    $this->assertTrue(Strings::create('true')->isBoolean());
    $this->assertTrue(Strings::create('trUe')->isBoolean());
    $this->assertTrue(Strings::create('TRUE')->isBoolean());
    $this->assertTrue(Strings::create('on')->isBoolean());
    $this->assertTrue(Strings::create('0')->isBoolean());
    $this->assertTrue(Strings::create(0)->isBoolean());
    $this->assertTrue(Strings::create('false')->isBoolean());
    $this->assertTrue(Strings::create('off')->isBoolean());
    $this->assertTrue(Strings::create('falSe')->isBoolean());
    $this->assertTrue(Strings::create('FALSE')->isBoolean());
});

test('test isTrue() method', function (): void {
    $this->assertTrue(Strings::create('1')->isTrue());
    $this->assertTrue(Strings::create(1)->isTrue());
    $this->assertTrue(Strings::create('true')->isTrue());
    $this->assertTrue(Strings::create('trUe')->isTrue());
    $this->assertTrue(Strings::create('TRUE')->isTrue());
    $this->assertTrue(Strings::create('on')->isTrue());
});

test('test isFalse() method', function (): void {
    $this->assertTrue(Strings::create('0')->isFalse());
    $this->assertTrue(Strings::create(0)->isFalse());
    $this->assertTrue(Strings::create('false')->isFalse());
    $this->assertTrue(Strings::create('falSe')->isFalse());
    $this->assertTrue(Strings::create('FALSE')->isFalse());
    $this->assertTrue(Strings::create('off')->isFalse());
});

test('test repeat() method', function (): void {
    $this->assertEquals('fòôfòôfòô', Strings::create('fòô')->repeat(3));
});

test('test setEncoding() and getEncoding() methods', function (): void {
    $this->assertEquals('UTF-8', Strings::create('fòô')->setEncoding('UTF-8')->getEncoding());
});

test('test offsetExists() method', function (): void {
    $strings = Strings::create('fòô');
    $this->assertTrue($strings[0] === 'f');
    $this->assertTrue($strings[1] === 'ò');
    $this->assertTrue($strings[2] === 'ô');
    $this->assertTrue($strings->offsetExists(0));
    $this->assertTrue($strings->offsetExists(1));
    $this->assertTrue($strings->offsetExists(2));
});

test('test offsetExists() method throws exception OutOfBoundsException', function (): void {
    $strings = Strings::create('fòô');
    $this->assertFalse($strings[3] === 'f');
    $this->assertFalse($strings->offsetExists(3));
})->throws(OutOfBoundsException::class);

test('test offsetGet() method', function (): void {
    $strings = Strings::create('fòô');
    $this->assertEquals('f', $strings[0]);
    $this->assertEquals('ò', $strings[1]);
    $this->assertEquals('ô', $strings[2]);
    $this->assertEquals('f', $strings->offsetGet(0));
    $this->assertEquals('ò', $strings->offsetGet(1));
    $this->assertEquals('ô', $strings->offsetGet(2));
});

test('test offsetGet() method throws exception OutOfBoundsException', function (): void {
    $strings = Strings::create('fòô');
    $this->assertEquals('f', $strings[3]);
    $this->assertEquals('f', $strings->offsetGet(3));
})->throws(OutOfBoundsException::class);

test('test offsetSet() method throws exception OutOfBoundsException', static function (): void {
    $strings = Strings::create('fòô');
    $strings->offsetSet(3, 'foo');
})->throws(Throwable::class);

test('test offsetUnset() method throws exception OutOfBoundsException', static function (): void {
    $strings = Strings::create('fòô');
    $strings->offsetUnset(3);
})->throws(Throwable::class);

test('test getIterator() method', function (): void {
    $this->assertInstanceOf(
        ArrayIterator::class,
        Strings::create()->getIterator()
    );
});

test('test copy() method', function (): void {
    $foo = Strings::create('fòô');
    $bar = $foo->copy();

    $this->assertInstanceOf(Strings::class, $foo);
    $this->assertInstanceOf(Strings::class, $bar);
    $this->assertEquals('fòô', $bar->toString());
});


test('test macro() method', function (): void {
    Strings::macro('concatenate', function(string $string) {
        return $this->toString() . $string;
    });
    $strings = new Strings('Hello');
    $this->assertEquals('Hello World', $strings->concatenate(' World'));
});
