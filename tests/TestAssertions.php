<?php

/**
 * Provides dependency-free assertions for TagManager's focused test suite.
 *
 * Related test files: every *Test.php file in this directory.
 */

function tagManagerAssertTrue($condition, $message)
{
    if (!$condition) {
        throw new RuntimeException($message);
    }
}

function tagManagerAssertFalse($condition, $message)
{
    tagManagerAssertTrue(!$condition, $message);
}

function tagManagerAssertSame($expected, $actual, $message)
{
    if ($expected !== $actual) {
        throw new RuntimeException(
            $message . ' Expected ' . var_export($expected, true) . ', got ' . var_export($actual, true) . '.'
        );
    }
}

function tagManagerAssertContains($needle, $haystack, $message)
{
    tagManagerAssertTrue(strpos($haystack, $needle) !== false, $message);
}

function tagManagerAssertNotContains($needle, $haystack, $message)
{
    tagManagerAssertTrue(strpos($haystack, $needle) === false, $message);
}
