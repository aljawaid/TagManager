<?php

/**
 * Verifies release metadata in Plugin.php.
 *
 * Related source file: Plugin.php.
 */

$plugin = $loadedPlugins['TagManager'];
tagManagerAssertSame('1.7.0', $plugin->getPluginVersion(), 'The tested plugin version must match the release metadata.');
tagManagerAssertSame('>=1.2.54', $plugin->getCompatibleVersion(), 'The compatibility floor must match the tested baseline.');
