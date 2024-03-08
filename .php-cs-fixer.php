<?php

$finder = Symfony\Component\Finder\Finder::create()
                                         ->in([
                                             __DIR__ . '/src',
                                         ])
                                         ->exclude(['config', 'build', 'vendor'])
                                         ->name('*.php')
                                         ->name('.php_cs.dist')
                                         ->name('_ide_helper')
                                         ->name('*.php')
                                         ->notName(['config_default.ini.php', 'config.ini.php'])
                                         ->ignoreDotFiles(true)
                                         ->ignoreVCS(true);

return (new PhpCsFixer\Config())
    ->setRules([
        '@PSR12'                            => true,
        'global_namespace_import'           => true,
        'array_syntax'                      => ['syntax' => 'short'],
        'ordered_imports'                   => ['sort_algorithm' => 'alpha'],
        'no_unused_imports'                 => true,
        'clean_namespace'                   => true,
        'not_operator_with_successor_space' => true,
        'single_import_per_statement'       => true,
        'no_empty_comment'                  => true,
        'no_superfluous_elseif'             => true,
        'no_useless_else'                   => true,
        'no_unneeded_import_alias'          => true,
        'no_leading_import_slash'           => true,
        'ternary_to_null_coalescing'        => true,
        'short_scalar_cast'                 => true,
        'no_closing_tag'                    => true,
        'trailing_comma_in_multiline'       => true,
        'fully_qualified_strict_types'      => true,
        'phpdoc_scalar'                     => true,
        'unary_operator_spaces'             => true,
        'binary_operator_spaces'            => [
            'default' => 'align_single_space_minimal',
        ],
        'blank_line_before_statement' => [
            'statements' => ['break', 'continue', 'declare', 'return', 'throw', 'try'],
        ],
        'modernize_strpos'                 => true, // needs PHP 8+ or polyfill
        'phpdoc_single_line_var_spacing'   => true,
        'phpdoc_var_without_name'          => true,
        'general_phpdoc_annotation_remove' => ['annotations' => ['expectedDeprecation']], // one should use PHPUnit built-in method instead
        'class_attributes_separation'      => [
            'elements' => [
                'method' => 'one',
            ],
        ],
        'method_argument_space' => [
            'on_multiline'                     => 'ensure_fully_multiline',
            'keep_multiple_spaces_after_comma' => true,
        ],
        'single_trait_insert_per_statement' => true,
    ])
    ->setRiskyAllowed(true)
    ->setFinder($finder);
