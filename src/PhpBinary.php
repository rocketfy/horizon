<?php

namespace Rocketfy\Horizon;

class PhpBinary
{
    /**
     * Get the path to the PHP executable.
     *
     * @return string
     */
    public static function path()
    {
        $escape = '\\' === DIRECTORY_SEPARATOR ? '"' : '\'';

        return $escape.PHP_BINARY.$escape;
    }
}
