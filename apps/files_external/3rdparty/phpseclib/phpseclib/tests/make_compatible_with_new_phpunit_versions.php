<?php

/** @var iterable<SplFileInfo> $files */
$files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator(__DIR__));
foreach ($files as $file) {
    if ($file->getExtension() === 'php' && $file->getPathname() !== __FILE__) {
        $fileContents = file_get_contents($file->getPathname());
        if ($fileContents === false) {
            throw new \RuntimeException('file_get_contents() failed: ' . $file->getPathname());
        }
        $patternToReplacementMap = [
            '~ function setUpBeforeClass\(\)~' => ' function setUpBeforeClass(): void',
            '~ function setUp\(\)~' => ' function setUp(): void',
            '~ function tearDown\(\)~' => ' function tearDown(): void',
            '~ function assertIsArray\(\$actual, \$message = \'\'\)~' => ' function assertIsArray($actual, string $message = \'\'): void',
            '~ function assertIsResource\(\$actual, \$message = \'\'\)~' => ' function assertIsResource($actual, string $message = \'\'): void',
            '~ function assertIsObject\(\$actual, \$message = \'\'\)~' => ' function assertIsObject($actual, string $message = \'\'): void',
            '~ function assertIsString\(\$actual, \$message = \'\'\)~' => ' function assertIsString($actual, string $message = \'\'): void',
            '~ function assertStringContainsString\(\$needle, \$haystack, \$message = \'\'\)~' => ' function assertStringContainsString(string $needle, string $haystack, string $message = \'\'): void',
            '~ function assertStringNotContainsString\(\$needle, \$haystack, \$message = \'\'\)~' => ' function assertStringNotContainsString(string $needle, string $haystack, string $message = \'\'): void',
            '~ function assertMatchesRegularExpression\(\$pattern, \$string, \$message = \'\'\)~' => ' function assertMatchesRegularExpression(string $pattern, string $string, string $message = \'\'): void',
        ];
        $updatedFileContents = preg_replace(
            array_keys($patternToReplacementMap),
            array_values($patternToReplacementMap),
            $fileContents
        );
        if (file_put_contents($file->getPathname(), $updatedFileContents) === false) {
            throw new \RuntimeException('file_put_contents() failed: ' . $file->getPathname());
        }
    }
}
