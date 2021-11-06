<?php

return (new PhpCsFixer\Config())
    ->setRules([
        '@PSR2' => true,
        'concat_space' => ['spacing' => 'one'],
        'no_unused_imports' => true,
        'ordered_imports' => true,
        'new_with_braces' => true,
        'method_argument_space' => false,
        'whitespace_after_comma_in_array' => true,
        'method_argument_space' => [
            'keep_multiple_spaces_after_comma' => true, // for wordpress constants
            'on_multiline' => 'ignore', // consider removing this someday
        ],
        'return_type_declaration' => [
            'space_before' => 'none'
        ],
    ])
    ->setFinder(
        PhpCsFixer\Finder::create()
            ->in(__DIR__)
    )
;
