<?php

/**
 * Bootstrapping File for phpseclib
 *
 * composer isn't a requirement for phpseclib 2.0 but this file isn't really required
 * either. it's a bonus for those using composer but if you're not phpseclib will
 * still work
 *
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 */
if (extension_loaded('mbstring')) {
    // 2 - MB_OVERLOAD_STRING
    if (ini_get('mbstring.func_overload') & 2) {
        throw new UnexpectedValueException(
            'Overloading of string functions using mbstring.func_overload ' .
            'is not supported by phpseclib.'
        );
    }
}
