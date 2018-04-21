<?php

$finder = PhpCsFixer\Finder::create()
    ->exclude('lib/composer')
    ->exclude('build')
    ->exclude('apps/files_external/3rdparty')
    ->in(__DIR__)
;

return PhpCsFixer\Config::create()
    ->setRules([
        'native_function_invocation' => true
    ])
    ->setFinder($finder)
;