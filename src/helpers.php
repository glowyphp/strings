<?php

/*
 * This file is part of Glowy Strings Package.
 *
 * (c) Sergey Romanenko
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Glowy\Strings;

use Glowy\Strings\Strings;

if (! function_exists('strings')) {
    /**
     * Create a new stringable object from the given string.
     *
     * Initializes a Strings object and assigns both $string and $encoding properties
     * the supplied values. $string is cast to a string prior to assignment. Throws
     * an InvalidArgumentException if the first argument is an array or object
     * without a __toString method.
     *
     * @param mixed $string   Value to modify, after being cast to string. Default: ''
     * @param mixed $encoding The character encoding. Default: UTF-8
     */
    function strings($string = '', $encoding = 'UTF-8'): \Glowy\Strings\Strings
    {
        return new Strings($string, $encoding);
    }
}
