<?php

/**
 * @author    Jim Wigginton <terrafrost@php.net>
 * @copyright 2014 Jim Wigginton
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace phpseclib3\Tests\Unit\File;

use phpseclib3\File\ANSI;
use phpseclib3\Tests\PhpseclibTestCase;

class ANSITest extends PhpseclibTestCase
{
    public function testCase1()
    {
        $str = "\x1B[07m"; // turn reverse video on
        $str .= "aaaaaaaaaaaaaaaaaa";
        $str .= "\x1B[10D"; // move cursor left 10 lines
        $str .= "\x1B[m"; // reset everything
        $str .= "bbb";

        $ansi = new ANSI();
        $ansi->appendString($str);

        $expected = '<pre width="80" style="color: white; background: black">';
        $expected .= '<span style="color: black"><span style="background: white">aaaaaaaa</span></span>';
        $expected .= 'bbb';
        $expected .= '<span style="color: black"><span style="background: white">aaaaaaa</span></span>';
        $expected .= '</pre>';

        $this->assertSame($ansi->getScreen(), $expected);
    }

    public function testCaseJ()
    {
        $str = "\x1B[H"; // Move cursor to upper left corner
        $str .= "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
        $str .= "\x1B[H"; // Move cursor to upper left corner
        $str .= "\x1B[J"; // Clear screen from cursor down

        $ansi = new ANSI();
        $ansi->appendString($str);

        $expected = '<pre width="80" style="color: white; background: black">';
        $expected .= '</pre>';

        $this->assertSame($ansi->getScreen(), $expected);
    }

    public function testLineOverflow()
    {
        $str = '';
        foreach (range('a', 'y') as $char) {
            $str .= "$char\r\n";
        }
        $str .= str_repeat('z', 100);

        $ansi = new ANSI();
        $ansi->appendString($str);

        $screen = $ansi->getScreen();

        $lines = explode("\r\n", $screen);
        $this->assertCount(24, $lines);
        $this->assertSame(str_repeat('z', 80), $lines[22]);
    }
}
