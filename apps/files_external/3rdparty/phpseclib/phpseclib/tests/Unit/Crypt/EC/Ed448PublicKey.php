<?php

namespace phpseclib3\Tests\Unit\Crypt\EC;

use phpseclib3\Common\Functions\Strings;
use phpseclib3\Crypt\EC\Curves\Ed448;
use phpseclib3\Crypt\EC\Formats\Keys\Common;

class Ed448PublicKey
{
    use Common;

    public static function load($key, $password = '')
    {
        if (!Strings::is_stringable($key)) {
            throw new \UnexpectedValueException('Key should be a string - not a ' . gettype($key));
        }

        $components = ['curve' => new Ed448()];
        $components['QA'] = self::extractPoint($key, $components['curve']);

        return $components;
    }
}
