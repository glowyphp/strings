<?php

declare(strict_types=1);

use Atomastic\Strings\Strings;

if (! function_exists('strings')) {
    function strings($string = '', string $encoding = 'UTF-8'): Strings
    {
        return new Strings($string, $encoding);
    }
}
