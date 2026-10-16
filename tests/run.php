<?php

// phpcs:ignoreFile PSR1.Files.SideEffects.FoundWithSymbols -- The runner defines Kanboard constants.

/**
 * Boots Kanboard and runs TagManager's focused production regression tests.
 *
 * Related test files: TestAssertions.php and every *Test.php file in this directory.
 */

$kanboardRoot = isset($argv[1]) ? realpath($argv[1]) : false;

if ($kanboardRoot === false || !is_file($kanboardRoot . '/app/common.php')) {
    fwrite(STDERR, "Usage: php tests/run.php <kanboard-root>\n");
    exit(2);
}

$pluginsRoot = getenv('KANBOARD_PLUGINS_DIR') ?: $kanboardRoot . '/plugins';
$databaseFile = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'tag-manager-' . bin2hex(random_bytes(8)) . '.sqlite';

define('PLUGINS_DIR', $pluginsRoot);
define('DB_FILENAME', $databaseFile);

try {
    require $kanboardRoot . '/app/common.php';
    require __DIR__ . '/TestAssertions.php';

    $pluginName = 'TagManager';
    $loadedPlugins = $container['pluginLoader']->getPlugins();
    $incompatiblePlugins = $container['pluginLoader']->getIncompatiblePlugins();

    tagManagerAssertFalse(
        isset($incompatiblePlugins[$pluginName]),
        'TagManager must be compatible with the tested Kanboard release.'
    );
    tagManagerAssertTrue(isset($loadedPlugins[$pluginName]), 'TagManager must load before regression checks run.');

    $testFiles = glob(__DIR__ . '/*Test.php');
    sort($testFiles);

    foreach ($testFiles as $testFile) {
        require $testFile;
    }

    echo 'TagManager regression checks passed on Kanboard ' . APP_VERSION
        . ' with PHP ' . PHP_VERSION . PHP_EOL;
} catch (Throwable $exception) {
    fwrite(STDERR, get_class($exception) . ': ' . $exception->getMessage() . PHP_EOL);
    exit(1);
} finally {
    if (isset($container) && isset($container['db'])) {
        $container['db']->closeConnection();
    }

    foreach (array($databaseFile, $databaseFile . '-shm', $databaseFile . '-wal') as $path) {
        if (is_file($path)) {
            unlink($path);
        }
    }
}
