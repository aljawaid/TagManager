<?php

/**
 * Verifies every TagManager user-facing source string has catalogue coverage.
 *
 * Related source files: Plugin.php, controller and template PHP files, and locale catalogues.
 */

$sourceFiles = array(__DIR__ . '/../Plugin.php');
foreach (array('Controller', 'Template') as $directory) {
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(
        __DIR__ . '/../' . $directory,
        FilesystemIterator::SKIP_DOTS
    ));

    foreach ($iterator as $file) {
        if ($file->isFile() && $file->getExtension() === 'php') {
            $sourceFiles[] = $file->getPathname();
        }
    }
}

$sourceKeys = array();
foreach ($sourceFiles as $sourceFile) {
    $source = file_get_contents($sourceFile);
    preg_match_all("/\\bt\\(\\s*'((?:\\\\'|[^'])*)'/", $source, $matches);

    foreach ($matches[1] as $key) {
        $sourceKeys[stripslashes($key)] = true;
    }
}

$catalogs = array(
    'English (UK)' => require __DIR__ . '/../Locale/en_GB/translations.php',
    'Portuguese (Brazil)' => require __DIR__ . '/../Locale/pt_BR/translations.php',
    'starter template' => require __DIR__ . '/../Locale/translations-starter-template.php',
);

foreach ($catalogs as $catalogName => $catalog) {
    $missing = array_diff_key($sourceKeys, $catalog);
    tagManagerAssertSame(
        array(),
        array_keys($missing),
        $catalogName . ' must include every TagManager source string.'
    );
}
