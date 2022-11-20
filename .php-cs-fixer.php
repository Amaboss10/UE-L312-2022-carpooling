<?php

return (new PhpCsFixer\Config())
    ->setRiskyAllowed(true)
    ->setRules([
        '@PSR2' => true,
        '@Symfony' => true,
        '@PhpCsFixer' => true,
        'array_push' => true,
        'cast_spaces' => ['space'=>'single'],
        'combine_consecutive_issets' => false,
        'combine_consecutive_unsets' => false,
        'concat_space' => ['spacing'=>'one'],
        'constant_case' => ['case'=>'lower'],
        'declare_equal_normalize' => ['space'=>'single'],
        'declare_strict_types' => true,
        'dir_constant' => true,
        'native_function_invocation' => ['include' => ['@all']],
        'no_superfluous_elseif' => false,
        'no_superfluous_phpdoc_tags' => false,
        'php_unit_test_class_requires_covers' => false,
        'phpdoc_add_missing_param_annotation' => false,
        'phpdoc_order' => false,
        'phpdoc_order_by_value' => false,
        'phpdoc_var_annotation_correct_order' => false,
        'standardize_increment' => false,
        'yoda_style' => false,
        'blank_line_after_opening_tag' => false,
        'blank_line_before_statement' => ['statements' => ['return']],
        'linebreak_after_opening_tag' => false,
        'increment_style' => ['style' => 'post'],
        'function_declaration' => ['closure_function_spacing' => 'none'],
    ])
    ->setLineEnding("\n")
;