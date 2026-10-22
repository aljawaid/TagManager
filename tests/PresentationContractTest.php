<?php

/**
 * Verifies TagManager templates and CSS presentation contracts.
 *
 * Related source files: Assets/css/tag-manager.css, Template/project_tag/index.php,
 * Template/tag/index.php and Template/tagfilter.php.
 */

$css = file_get_contents(__DIR__ . '/../Assets/css/tag-manager.css');
tagManagerAssertContains('@media (max-width: 768px)', $css, 'Tag management pages must include a mobile layout.');
tagManagerAssertContains('@media (prefers-reduced-motion: reduce)', $css, 'Animations must respect reduced-motion preferences.');
tagManagerAssertContains('--surface-tag-manager: var(--panel-background-color', $css, 'Surfaces must follow Kanboard themes.');
tagManagerAssertContains('color: var(--color-primary, #333333)', $css, 'Settings help text must use the theme text colour.');
tagManagerAssertContains('transition: var(--transition-tag-manager)', $css, 'Interactive controls must retain smooth transitions.');
tagManagerAssertNotContains('background-color: white', $css, 'Plugin surfaces must not force a light-only background.');

foreach (array('project_tag/index.php', 'tag/index.php') as $templateName) {
    $template = file_get_contents(__DIR__ . '/../Template/' . $templateName);
    tagManagerAssertNotContains('src="/plugins/', $template, $templateName . ' must support subdirectory installations.');
    tagManagerAssertContains('$this->url->dir()', $template, $templateName . ' must build portable local asset URLs.');
    tagManagerAssertNotContains('"color-{$', $template, $templateName . ' must not interpolate unescaped color identifiers.');
    tagManagerAssertContains(
        '$this->text->e($tag[\'color_id\'])',
        $template,
        $templateName . ' must escape tag color identifiers before rendering CSS classes.'
    );
}

$projectTagTemplate = file_get_contents(__DIR__ . '/../Template/project_tag/index.php');
tagManagerAssertContains(
    '$this->text->e($gTag[\'color_id\'])',
    $projectTagTemplate,
    'The project tag page must escape global tag color identifiers before rendering CSS classes.'
);

$filterTemplate = file_get_contents(__DIR__ . '/../Template/tagfilter.php');
tagManagerAssertContains('aria-label=', $filterTemplate, 'The tag filter control must have an accessible label.');
