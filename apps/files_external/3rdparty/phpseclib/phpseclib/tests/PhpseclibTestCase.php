<?php

/**
 * @author    Andreas Fischer <bantu@phpbb.com>
 * @copyright 2013 Andreas Fischer
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace phpseclib3\Tests;

use PHPUnit\Framework\TestCase;

abstract class PhpseclibTestCase extends TestCase
{
    protected $tempFilesToUnlinkOnTearDown = [];

    public function tearDown()
    {
        foreach ($this->tempFilesToUnlinkOnTearDown as $filename) {
            if (!file_exists($filename) || unlink($filename)) {
                unset($this->tempFilesToUnlinkOnTearDown[$filename]);
            }
        }
        parent::tearDown();
    }

    /**
     * Creates a temporary file on the local filesystem and returns its path.
     * The $number_of_writes and $bytes_per_write parameters can be used to
     * write $number_of_writes * $bytes_per_write times the character 'a' to the
     * temporary file. All files created using this method will be deleted from
     * the filesystem on tearDown(), i.e. after each test method was run.
     *
     * @param int $number_of_writes
     * @param int $bytes_per_write
     *
     * @return string
     */
    protected function createTempFile($number_of_writes = 0, $bytes_per_write = 0)
    {
        $filename = tempnam(sys_get_temp_dir(), 'phpseclib-test-');
        $this->assertTrue(file_exists($filename));
        $this->tempFilesToUnlinkOnTearDown[] = $filename;
        if ($number_of_writes > 0 && $bytes_per_write > 0) {
            $fp = fopen($filename, 'wb');
            for ($i = 0; $i < $number_of_writes; ++$i) {
                fwrite($fp, str_repeat('a', $bytes_per_write));
            }
            fclose($fp);
            $this->assertSame($number_of_writes * $bytes_per_write, filesize($filename));
        }
        return $filename;
    }

    /**
     * @param string $constant
     * @param mixed $expected
     *
     * @return null
     */
    protected static function ensureConstant($constant, $expected)
    {
        if (defined($constant)) {
            $value = constant($constant);

            if ($value !== $expected) {
                if (extension_loaded('runkit')) {
                    if (!runkit_constant_redefine($constant, $expected)) {
                        self::markTestSkipped(sprintf(
                            "Failed to redefine constant %s to %s",
                            $constant,
                            $expected
                        ));
                    }
                } else {
                    self::markTestSkipped(sprintf(
                        "Skipping test because constant %s is %s instead of %s",
                        $constant,
                        $value,
                        $expected
                    ));
                }
            }
        } else {
            define($constant, $expected);
        }
    }

    protected static function getVar($obj, $var)
    {
        $reflection = new \ReflectionClass(get_class($obj));
        $prop = $reflection->getProperty($var);
        $prop->setAccessible(true);
        return $prop->getValue($obj);
    }

    public static function callFunc($obj, $func, $params = [])
    {
        $reflection = new \ReflectionClass(get_class($obj));
        $method = $reflection->getMethod($func);
        $method->setAccessible(true);
        return $method->invokeArgs($obj, $params);
    }

    // assertIsArray was not introduced until PHPUnit 8
    public static function assertIsArray($actual, $message = '')
    {
        if (method_exists(parent::class, 'assertIsArray')) {
            parent::assertIsArray($actual, $message);
            return;
        }

        parent::assertInternalType('array', $actual, $message);
    }

    // assertIsString was not introduced until PHPUnit 8
    public static function assertIsString($actual, $message = '')
    {
        if (method_exists(parent::class, 'assertIsString')) {
            parent::assertIsString($actual, $message);
            return;
        }

        parent::assertInternalType('string', $actual, $message);
    }

    // assertIsResource was not introduced until PHPUnit 8
    public static function assertIsResource($actual, $message = '')
    {
        if (method_exists(parent::class, 'assertIsResource')) {
            parent::assertIsResource($actual, $message);
            return;
        }

        parent::assertInternalType('resource', $actual, $message);
    }

    // assertIsObject was not introduced until PHPUnit 8
    public static function assertIsObject($actual, $message = '')
    {
        if (method_exists(parent::class, 'assertIsObject')) {
            parent::assertIsObject($actual, $message);
            return;
        }

        parent::assertInternalType('object', $actual, $message);
    }

    // assertContains is deprecated for strings in PHPUnit 8
    public static function assertStringContainsString($needle, $haystack, $message = '')
    {
        if (method_exists(parent::class, 'assertStringContainsString')) {
            parent::assertStringContainsString($needle, $haystack, $message);
            return;
        }

        parent::assertContains($needle, $haystack, $message);
    }

    // assertNotContains is deprecated for strings in PHPUnit 8
    public static function assertStringNotContainsString($needle, $haystack, $message = '')
    {
        if (method_exists(parent::class, 'assertStringContainsString')) {
            parent::assertStringNotContainsString($needle, $haystack, $message);
            return;
        }

        parent::assertNotContains($needle, $haystack, $message);
    }

    /**
     * assertRegExp() was deprecated in favor of assertMatchesRegularExpression().
     *
     * @param string $pattern
     * @param string $string
     * @param string $message
     * @return void
     */
    public static function assertMatchesRegularExpression($pattern, $string, $message = '')
    {
        if (method_exists(parent::class, 'assertMatchesRegularExpression')) {
            parent::assertMatchesRegularExpression($pattern, $string, $message);
        } else {
            parent::assertRegExp($pattern, $string, $message);
        }
    }
}
