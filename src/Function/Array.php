<?php
/**
 * This file is a part of Nenglish7/Function.
 *
 * Copyright (c) 2018 Nicholas English <https://github.com/Nenglish7>.
 */
 
namespace Nenglish7\Function\Array;

/**
 * array_depth().
 *
 * Get current depth of an array.
 *
 * @param array $array The array to test
 *
 * @throws InvalidArgumetException If `$array` is not an array.
 *
 * @return int Return the current depth of the array passed.
 */
function array_depth($array)
{
    if (!\is_array($array)) {
        throw new Exception\InvalidArgumetException(\sprintf(
            '`$array` has to be an array data type. passed: `%s`.',
            \htmlspecialchars(\var_export(\serialize($array), \true), \ENT_QUOTES, 'UTF-8')
        ));
    }
    $depth = 1;
    if (empty($array)) {
        goto finish;
    }
    foreach ($array as $value) {
        if (\is_array($value)) {
            $depth += array_depth($value);
            break;
        }
    }
    finish:
    return $depth;
}
